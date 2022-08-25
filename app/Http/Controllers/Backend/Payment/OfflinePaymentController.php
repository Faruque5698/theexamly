<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use App\Models\Backend\Batch;
use App\Models\Backend\BatchCategory;
use App\Models\Backend\Student;
use App\Models\Backend\Course;
use App\Models\Backend\CourseFee;
use App\Models\Backend\PaymentHistory;
use App\Models\Backend\GenaralSettings;
use App\Models\Backend\BatchStudent;
use App\Models\Backend\Expense;
use App\Models\Backend\Coupon;
use App\Models\Frontend\CashOnPayment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class OfflinePaymentController extends Controller
{
    public function index(Request $request){

        $batch_id = $request->batch_id;
        $batch_name = empty($batch_id)? 'All Batches' : Batch::find($batch_id)->name;
        $generalSettings = GenaralSettings::first();
        if($batch_id==0){                        
            $dues = BatchStudent::with('User')->where('due_amount','>','0')->latest()->get();
            $sum = BatchStudent::where('deleted_at',NULL)->sum('due_amount');
        }
        else{
        $dues = BatchStudent::with('User')->where('batch_id',$batch_id)->where('due_amount','>','0')->get();
        $sum = BatchStudent::where('batch_id',$batch_id)->where('deleted_at',NULL)->sum('due_amount');
        }
        return view('backend.pages.payment.offline.duePayment.duePaymentList',compact(['dues','batch_id','generalSettings','batch_name','sum']));
    }

    public function indexIndividual($id,$batch_id){
        
        $user_id = $id;
        $batch_id = $batch_id;
        $students = Student::with('user')->where('user_id',$id)->get();
        $courseFee = CourseFee::get();
        $paymentHistorys = PaymentHistory::where('user_id',$user_id)->get();
        $paymentHistory = DB::table('batch_students')->join('payment_histories','payment_histories.batch_id','=','batch_students.batch_id')->where('payment_histories.user_id',$id)->where('payment_histories.batch_id',$batch_id)->get();
        $batchStudent = BatchStudent::with(
            ['paymentHistory' => function ($query) use ($user_id,$batch_id) {
            $query->where('user_id',$user_id)->where('batch_id',$batch_id);
            }])->where('user_id',$id)->where('batch_id',$batch_id)->get();

        
        $totalCourseFee = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('course_fee')->first();
        $totalPaymentAmount = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('paymented_amount')->first();
        $totalDue = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('due_amount')->first();

        $generalSettings = GenaralSettings::first();
        $batches = BatchStudent::where('user_id',$user_id)->get();
        // return response()->json($batchStudent);
        return view('backend.pages.payment.offline.indexSingle',compact('students','courseFee','paymentHistory','generalSettings','batches','batchStudent','paymentHistorys','totalCourseFee','totalPaymentAmount','totalDue'));
    }

    public function indexs(Request $request){

        $batch_id = $request->batch_id;
        $students = BatchStudent::with('user')->where('batch_id',$batch_id)->get();
        $courseFee = CourseFee::get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.payment.offline.indexBatchWise',compact('batch_id','students','courseFee','generalSettings'));
    }

    public function batchWise() {

        $name = Student::with(['User'])->latest()->get();
        $batch = Batch::where('status','=',1)->get()->pluck('name','id');
        $students = DB::table('students')->pluck("student_id","user_id");

        return view('backend.pages.payment.offline.findBatchWise', compact(['batch','students','name']));
    }

    public function Individual() {
        $students = null;
        $batch = Batch::where('status','=',1)->get()->pluck('name','id');
        $students = DB::table('students')->get();
        $phone = DB::table('users')->where('user_type','Student')->get();
        $student = Student::with('user')->select('user_id')->get();
        return view('backend.pages.payment.offline.findSingle');
    }

    public function indexIndividual2(Request $request){

        $user_id = $request->user_id2;
        $user_id2 = $request->user_id2;

        if($user_id = $request->user_id2){
            $id = $user_id;
        }
        else{
            $id = $request->user_id2;
        }

        if($id != null){
            $students = Student::with('user')->where('user_id',$id)->get();
            $batch_id = Student::with('user')->where('user_id',$id)->get()->pluck('batch_id')->first();
            $batchStudent = BatchStudent::with(['paymentHistory2' => function ($query) use ($user_id) {
                $query->where('user_id',$user_id)->orderBy('payment_date','DESC');
                }])->where('user_id',$id)->latest()->get();
            $batches = BatchStudent::where('user_id',$id)->get();
            $generalSettings = GenaralSettings::first();
            $totalCourseFee = BatchStudent::where('user_id',$user_id)->get()->pluck('course_fee','batch_id');
            $totalPaymentAmount = BatchStudent::where('user_id',$user_id)->get()->pluck('paymented_amount','batch_id');
            // return response()->json($totalCourseFee);
            $totalDue = BatchStudent::where('user_id',$user_id)->get()->pluck('due_amount','batch_id');
            // return $batchStudent;
            return view('backend.pages.payment.offline.batchWisePayment',compact('students','generalSettings','batchStudent','batches','totalCourseFee','totalPaymentAmount','totalDue'));
        }
        else{
            return redirect()->route('admin.payment.Individual');
        }
    }

    public function getStudent($id)
    {
        $student_name=Student::with(['User'])->where("user_id",$id)
                        ->join('users','users.id','=','students.user_id')
                        ->pluck("users.name","users.id");
                        // ->select('user.id', 'user.name','user.phone')->get()->toArray();

       return json_encode($student_name);
    }

    public function getStudentPhone($id)
    {
        $student_name=Student::with(['User'])->where("user_id",$id)
                        ->join('users','users.id','=','students.user_id')
                        ->pluck("users.phone","users.id");
                        // ->select('user.id', 'user.name','user.phone')->get()->toArray();

       return json_encode($student_name);
    }

    public function create($user_id, $batch_id)
    {
        $course_fee = null;
        $totall_course_fee = null;
        $coupon_code = null;
        $user_id = $user_id;
        $batch_id = $batch_id;
        $students = BatchStudent::with(['user','Student'])->where('user_id',$user_id)->where('batch_students.batch_id',$batch_id)->get();

        //paymented fied check from batchStudent
        $paymentedAmountCheck = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('course_fee')->first();
        $fixedCourseFee = CourseFee::where('batch_id',$batch_id)->get()->pluck('course_fee')->first();

        $due_course_fee = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('due_amount')->first();
        
        return view('backend.pages.payment.offline.create',compact('students','fixedCourseFee','coupon_code','course_fee','due_course_fee','paymentedAmountCheck'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate(
            $request,
            [
                'user_id' => 'required',
                'student_id' => 'required',
                'batch_id' => 'required',
                'course_fee' => 'nullable',
                'paymented_amount' => 'required|integer|min:0',
                'coupon_code' => 'nullable',
                'due_amount' => 'nullable',
                'payment_method' => 'required',
                'payment_date' => 'required',
                'description' => 'nullable'
            ],
        );
        $id = $request->user_id;
        $batch_id = $request->batch_id;
        $course_fee = $request->course_fee;
        $coupon_code = $request->coupon_code;
        $dueCheck = BatchStudent::where('user_id',$id)->where('batch_id', $batch_id)->get()->pluck('due_amount')->first();
        $paymented_amount = $request->paymented_amount;
        // $upto =($dueCheck/2);
        if($dueCheck < $paymented_amount and $dueCheck != NULL and $dueCheck == 0){
            return back()->with('warning', 'Please check your due amount.');
        }
        elseif($dueCheck < $paymented_amount and $dueCheck != NULL){
            return back()->with('warning', 'Please check your due amount.');
        }
        elseif($paymented_amount > $course_fee ){
            return back()->with('warning', 'Please check your total amount.');
        }
        elseif($paymented_amount > $course_fee and $coupon_code != null ){
            return back()->with('warning', 'Please check your total amount.');
        }
        // elseif($paymented_amount < $upto ){
        //     return back()->with('warning', 'Payment amount must be 50% or up.');
        // }
        else {
        $collectFees = new PaymentHistory();
        $collectFees->user_id = $request->user_id;
        $collectFees->student_id = $request->student_id;
        $collectFees->batch_id = $request->batch_id;
        $collectFees->paymented_amount = $request->paymented_amount;
        $collectFees->coupon_code = $request->coupon_code;
        $collectFees->payment_method = $request->payment_method;
        $collectFees->payment_date = $request->payment_date;
        $collectFees->description = $request->description;
        $collectFees->save();
    
        //user_coupons table data insert
        $coupon_code = $request->coupon_code;
        $coupon_id = Coupon::where('name',$coupon_code)->get()->pluck('id')->first();
        $coupon_status = Coupon::where('name',$coupon_code)->get()->pluck('use_status')->first();
        if($coupon_code != null){
            $user_coupon = DB::table('user_coupon')->insert([
                   'user_id' => $request->user_id,
                   'student_id' => $request->student_id,
                   'coupon_id' => $coupon_id,
                   'description' => $request->description
            ]);
        }
        //coupons table status update
        if($coupon_id != null){
        $coupon = Coupon::find($coupon_id);
        $coupon->use_status = '1';
        $coupon->save();
        }
        //batch_students table course fee,paymented-amount,due update
        $batches_id = BatchStudent::where('user_id',$id)->where('batch_id',$batch_id)->get()->pluck('id')->first();
        $total_payment_amount = PaymentHistory::where('user_id',$id)->where('batch_id',$batch_id)->get()->sum("paymented_amount");
        $totall_course_fee = BatchStudent::where('user_id',$id)->where('batch_id', $batch_id)->get()->pluck('course_fee')->first();
        $discount_amount = Coupon::where('id',$coupon_id)->get()->pluck('discount_amount')->first();
        // $totall_course_fee = $request->totall_course_fee;
        if($course_fee == null ){
        $batchStudent = BatchStudent::find($batches_id);
        $batchStudent->course_fee = $totall_course_fee;
        $batchStudent->paymented_amount = $total_payment_amount;
        $paymented_amount = $batchStudent->paymented_amount = $total_payment_amount;
        $due_amount = ($totall_course_fee - $paymented_amount);
        $batchStudent->due_amount = $due_amount;
        $batchStudent->commitment_date = $request->commitment_date;
        $batchStudent->save();
        }//newtest
        elseif($course_fee == null and $coupon_id !=null){
        $batchStudent = BatchStudent::find($batches_id);
        $batchStudent->course_fee = $totall_course_fee - $discount_amount;
        $batchStudent->paymented_amount = $total_payment_amount;
        $course_fees = $batchStudent->course_fee = $totall_course_fee - $discount_amount;
        $paymented_amount = $batchStudent->paymented_amount = $total_payment_amount;
        $due_amount = ($course_fees - $paymented_amount);
        $batchStudent->due_amount = $due_amount;
        $batchStudent->commitment_date = $request->commitment_date;
        $batchStudent->save();
        }
        // elseif($paymented_amount < $total_payment_amount and $coupon_id !=null){
        // $batchStudent = BatchStudent::find($batches_id);
        // $batchStudent->course_fee = $request->course_fee;
        // $batchStudent->paymented_amount = $total_payment_amount;
        // $paymented_amount = $batchStudent->paymented_amount = $total_payment_amount;
        // $due_amount = ($course_fee - $paymented_amount);
        // $batchStudent->due_amount = $due_amount;
        // $batchStudent->save();
        else{
        $batchStudent = BatchStudent::find($batches_id);
        $batchStudent->course_fee = $batchStudent->course_fee-$discount_amount;
        $batchStudent->paymented_amount = $total_payment_amount;
        $paymented_amount = $batchStudent->paymented_amount = $total_payment_amount;
        $due_amount = ($batchStudent->course_fee - $paymented_amount);
        $batchStudent->due_amount = $due_amount;
        $batchStudent->commitment_date = $request->commitment_date;
        $batchStudent->save();
        }
        // $user->syncRoles([3]);
        // $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();
        // if (is_array($role_permissions) && count($role_permissions)) {
        //     $user->syncPermissions($role_permissions);
        // }
        //for send sms
        // $number = $request->phone;
        // $text = $request->name;
        // $response=$this->sendsms($phone,$sms);

        return redirect()->route('admin.collectFees.indexIndividual',[$id,$batch_id])->with('success', ('Payment Successfull'));
        // return back()->with('success', ('Payment Successfull'));
     }
    }

    //sendsms for successful registration
    public function sendsms($number,$text){       
      
        $DOMAIN = GenaralSettings::get()->pluck('sms_api_url')->first();
        $SID = GenaralSettings::get()->pluck('sid')->first();
        $API_TOKEN = GenaralSettings::get()->pluck('sms_username')->first();

        $messageData = [
            [
                "msisdn" => $number,
                "text" => $text,
                "csms_id" => uniqid(),
            ]
        ];

        $params = [
            "api_token" => $API_TOKEN,
            "sid" => $SID,
            "sms" => $messageData,
        ];

        $params = json_encode($params);
        $url = trim($DOMAIN, '/') . "/api/v3/send-sms/dynamic";

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params),
            'accept:application/json'
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function show($id)
    {
        $batch = Batch::with(['course','batchCategory'])->findOrFail($id);

        return response()->json(['success' => true, 'batch' => $batch]);
    }

    public function edit($p_id, $bs_id)
    {
        $paymentHistory = PaymentHistory::findOrFail($p_id);
        $batchStudent = BatchStudent::with(['User','Batch'])->findOrFail($bs_id);
        
        return view('backend.pages.payment.offline.edit',compact(['paymentHistory','batchStudent']));
    }

    public function update(Request $request, $p_id, $bs_id)
    {
        $p_id = PaymentHistory::find($p_id);
        $bs_id = BatchStudent::find($bs_id);
        $previous_amount2 = BatchStudent::where('id',$bs_id->id)->pluck('paymented_amount')->first();
        $due_amount = BatchStudent::where('id',$bs_id->id)->pluck('due_amount')->first();
        $previous_amount = PaymentHistory::where('id',$p_id->id)->pluck('paymented_amount')->first();
        $updated_amount = ($previous_amount - $request->update_amount);
        
        $pHistory = PaymentHistory::find($p_id->id);
        $pHistory->paymented_amount = $request->update_amount;      
        $pHistory->save();

        $bStudent = BatchStudent::find($bs_id->id);
        $bStudent->paymented_amount = $previous_amount2 - $updated_amount;
        $bStudent->due_amount = $due_amount + $updated_amount;
        $bStudent->save();

        return redirect()->back()->with('success', 'Payment Updated Successfull');
    }

    public function destroy($user_id,$batch_id)
    {
        
        $id = PaymentHistory::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('id')->first();
        $paymentAmount = PaymentHistory::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('paymented_amount')->first();
        $paymentHistory = PaymentHistory::findOrFail($id);
        $paymentHistory->delete();
        // $paymentHistory = DB::table('payment_histories')->where('id', '=', $id)->delete();

        //User_coupon table delete
        $userCouponId = PaymentHistory::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('id')->first();
        $userCoupon = DB::table('user_coupon')->where('id', '=', $userCouponId)->delete();

        //batchStudent Revert
        $batchStudentId = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('id')->first();
        // dd($batchStudentId);
        $paymented_amount = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('paymented_amount')->first();
        $batchStudent = BatchStudent::find($batchStudentId);
        $batchStudent->course_fee = null;
        $batchStudent->paymented_amount = $paymented_amount - $paymentAmount;
        $batchStudent->due_amount = $due_amount + $paymentAmount;
        $batchStudent->save();
        return redirect()->back()->with('success', 'Delete Successfull');
    }

    public function changeStatusPublish(Request $request)
    {
        $user = Batch::find($request->category_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function archive() 
    {
        $date = today()->format('Y-m-d');
        $batches = Batch::where('end_date','<',$date)->latest()->get();
        return view('backend.pages.batch.archiveBatch.index', compact('batches'));
    }

    public function couponCheck(Request $request, $user_id, $batch_id)
    {

        // dd($request);
        $couponCode = $request->coupon_code;
        $paymentedAmountCheck = $request->course_fee;
        $batch_id = $batch_id;
        $user_id = $user_id;
        // dd($batch_id);
        $use_status = Coupon::where('name',$couponCode)->get()->pluck('use_status')->first();

        $expires_at = Coupon::where('name',$couponCode)->get()->pluck('expires_at')->first();

        $date = today()->format('Y-m-d');

        $due_course_fee = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('due_amount')->first();

        if($use_status == "USED"){

            return  back()->with('error', 'This Coupon Code Already in Used.');
        }
        elseif($use_status == "UNUSED" and $expires_at <  $date){

             return  back()->with('warning', 'This Coupon Code Date Already Expired.');

        }

        elseif($use_status == "UNUSED" and $expires_at >=  $date){

            $data = Coupon::where('name',$couponCode)->where('use_status','0')->where('expires_at','>=',$date)->get()->pluck('discount_amount')->first();
            $course_fee = $paymentedAmountCheck - $data;

            $students = BatchStudent::with(['User','Student'])->where('user_id',$user_id)->where('batch_students.batch_id',$batch_id)->get();
            $coupon_code = $couponCode;
            return view('backend.pages.payment.offline.create',compact('course_fee','coupon_code','students','paymentedAmountCheck','due_course_fee'));
            }
        else
        {
            return back()->with('warning', 'Please insert right coupon code');
        }

    }
    public function couponCheck4(Request $request, $user_id, $batch_id){

        // dd($request);
        $couponCode = $request->coupon_code;
        $paymentedAmountCheck = $request->course_fee;
        $batch_id = $batch_id;
        $user_id = $user_id;
        // dd($batch_id);
        $use_status = Coupon::where('name',$couponCode)->get()->pluck('use_status')->first();

        $expires_at = Coupon::where('name',$couponCode)->get()->pluck('expires_at')->first();

        $date = today()->format('Y-m-d');



        if($use_status == "USED"){

            return  back()->with('error', 'This Coupon Code Already in Used.');
        }
        elseif($use_status == "UNUSED" and $expires_at <  $date){

             return  back()->with('warning', 'This Coupon Code Date Already Expired.');

        }

        elseif($use_status == "UNUSED" and $expires_at >=  $date){

            $data = Coupon::where('name',$couponCode)->where('use_status','0')->where('expires_at','>=',$date)->get()->pluck('discount_amount')->first();
            $course_fee = $paymentedAmountCheck - $data;

            $students = BatchStudent::with(['User','Student'])->where('user_id',$user_id)->where('batch_students.batch_id',$batch_id)->get();
            $coupon_code = $couponCode;
            return view('backend.pages.payment.offline.create_v4',compact('course_fee','coupon_code','students','paymentedAmountCheck'));
            }
        else
        {
            return back()->with('warning', 'Please insert right coupon code');
        }

    }
    public function studentPhone(Request $request)
    {

        if ($request->ajax()) {

            $data = user::where('users.phone', 'LIKE', $request->name . '%')->orwhere('users.name', 'LIKE', $request->name . '%') ->limit(5)->get();

            $output = '';

            if (count($data) > 0) {

                //$output = '<div class="form-group"  >';

                foreach ($data as $row) {

                    $output .= '<option '. 'value'. '=' .$row->id.'>' .   $row->name . '-' .$row->phone . '</option>';
                }

                //$output .= '</div>';
            } else {

                $output =  'No results' ;
            }

            return $output;
        }
    }

    public function studentId(Request $request)
    {

        if ($request->ajax()) {

            $data = Student::with('user')->where('student_id', 'LIKE', $request->studentId . '%')->limit(5)->get();

            $output2 = '';

            if (count($data) > 0) {

                foreach ($data as $row) {

                    $output2 .= '<li '. 'value'. '=' .$row->user_id.'>' .   $row->user->name . '-' .$row->student_id . '</li>';
                }

            } else {

                $output2 =  'No results' ;
            }

            return $output2;
        }
    }

    //duePayment inside Payment Menu
    public function duePayment(){

        $batch = Batch::where('status','=',1)->get()->pluck('name','id');
        return view('backend.pages.payment.offline.duePayment.findDueBatchWise', compact('batch'));
    }

    //sendsms for successful registration
    // public function sendsms($number, $text)
    // {       
    //     $DOMAIN = "https://smsplus.sslwireless.com";
    //     $SID = "DEBASISHPK";
    //     $API_TOKEN = "Debasish PK-b9b61f4d-bf77-46d4-9428-f72d0368e059";

    //     $messageData = [
    //         [
    //             "msisdn" => $number,
    //             "text" => $text,
    //             "csms_id" => uniqid(),
    //         ]
    //     ];

    //     $params = [
    //         "api_token" => $API_TOKEN,
    //         "sid" => $SID,
    //         "sms" => $messageData,
    //     ];

    //     $params = json_encode($params);
    //     $url = trim($DOMAIN, '/') . "/api/v3/send-sms/dynamic";

    //     $ch = curl_init(); // Initialize cURL
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/json',
    //         'Content-Length: ' . strlen($params),
    //         'accept:application/json'
    //     ));

    //     $response = curl_exec($ch);
    //     curl_close($ch);

    //     return $response;
    // }

    //paymentReport inside Report Menu
    public function paymentReport(){

        $batch = Batch::where('status','=',1)->get()->pluck('name','id');
        // SMS due alert of 3 days warning

        $current = Carbon::today();
        $trialExpires = Carbon::today()->addDays(3);
        $dueAlerts = BatchStudent::with(['User','batch'])->where('due_amount','>',0)->whereBetween('commitment_date', [$current, $trialExpires])->latest()->get();
        // if($dueAlerts->isNotEmpty()){
        //     foreach ($dueAlerts as $dueAlert) {
        //         //for send sms
        //         $number = $dueAlert->user->phone;
        //         $text = 'Dear ' .$dueAlert->user->name.', 
        //             Payment Reminder: please pay your dues before '.$dueAlert->commitment_date.'. If you already paid your dues, please ignore this message.';
        //         dd($text);
        //         exit();
        //         $response=$this->sendsms($number,$text);
        //         return $response;
        //     }
        // }
        return view('backend.pages.payment.offline.paymentReport.findPaymentReport', compact('batch'));
    }

    public function paymentReportIndex(Request $request){
        $from=empty($request->start_date)? '' : (date(Carbon::parse($request->start_date)->format('d-m-Y')));
        $to=date(Carbon::parse($request->end_date)->format('d-m-Y'));
        \DB::statement("SET SQL_MODE=''");
        $batch_id = $request->batch_id;
        $batch_id=empty($batch_id)? '' : $request->batch_id;
        $batch_name = empty($batch_id)? 'All Batches' : Batch::find($batch_id)->name;
        $paymnets= PaymentHistory::with('User','batchStudent')
            ->when(!empty($request->batch_id) , function ($query) use($request){
            return $query->where('batch_id',$request->batch_id);
            })
            ->whereBetween('payment_date', [$from, $to])
            ->selectRaw('*, SUM(paymented_amount) as total_ammount, COUNT(DISTINCT batch_id)  as batch_count')
            ->groupBy('student_id')
            ->orderBy('student_id', 'asc')
            ->get();
        \DB::statement("SET SQL_MODE=only_full_group_by");
        $generalSettings = GenaralSettings::first();
        if($batch_id == null){
            $totalAll = BatchStudent::selectRaw('SUM(paymented_amount) as totalAll')->get()->first();
        }
        else{
            $totalAll = BatchStudent::selectRaw('SUM(paymented_amount) as totalAll')->where('batch_id',$batch_id)->get()->first();
        }
        return view('backend.pages.payment.offline.paymentReport.paymentStatement',compact(['paymnets','generalSettings','totalAll','batch_name']));
    }

    //Daily Income Expense inside Account Menu
    public function showDaily(){
        $batch = Batch::where('status','=',1)->get()->pluck('name','id');
        $date = date('d-m-Y');
        $date2 = Carbon::today();
        $income = PaymentHistory::where('payment_date',$date)->get();
        $expenseDate = Expense::get()->pluck('created_at')->first();
        $expense = Expense::whereDate('created_at',$date2)->get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.account.dailyIncomeExpenseCheck.dailyStatement', compact('income','expense','generalSettings'));
    }
    
        //Total Income inside Account Menu for theexamly
    public function findIncomeView(){

        // $course_id = PaymentHistory::distinct()->get('batch_id')->pluck('batch_id');
        // $examCategory = DB::table('course_course_category')->where('course_id',$course_id)->get('course_category_id');
        // dd( $examCategory);
        return view('backend.pages.account.income.findPaymentView');
    }

    public function showIncomeView(Request $request){

        $generalSettings = GenaralSettings::first();
        $start_date = date('d-m-Y', strtotime($request->start_date));
        $end_date = date('d-m-Y', strtotime($request->end_date));
        // $examCategory = $request->batch_id;

        $payments = PaymentHistory::with('user')->whereBetween('payment_date',[$start_date, $end_date])->orderBy('user_id', 'asc')->get();
        // $count = DB::table('payment_histories')->select('DISTINCT(user_id)')
            // ->whereBetween('payment_date',[$start_date, $end_date])
            // ->groupBy('student_id')
            // ->orderBy('student_id', 'asc')
            // ->get();
        // dd($count);
        // $batch_id=empty($batch_id)? '' : $request->batch_id;
        // $generalSettings = GenaralSettings::first();
        // $batch_name = empty($batch_id)? 'All Batches' : Batch::find($batch_id)->name;
        // \DB::statement("SET SQL_MODE=''");
        // $count= PaymentHistory::with('User')
        //     ->when(!empty($start_date) , function ($query) use($request){
        //     return $query->whereBetween('payment_date',[$start_date, $end_date]);
        //     })
        //     ->selectRaw('*, SUM(paymented_amount) as total_ammount, COUNT(DISTINCT user_id)  as user_count')
        //     ->groupBy('student_id')
        //     ->orderBy('student_id', 'asc')
        //     ->get();
        return view('backend.pages.account.income.incomeStatementView', compact(['generalSettings','payments']));
    }

    //Income inside Account Menu
    public function findIncome(){

        $batch = Batch::where('status','=',1)->get()->pluck('name','id');
        return view('backend.pages.account.income.findPayment', compact('batch'));
    }

    public function showIncome(Request $request){
        $batch_id = $request->batch_id;
        $batch_id=empty($batch_id)? '' : $request->batch_id;
        $generalSettings = GenaralSettings::first();
        $batch_name = empty($batch_id)? 'All Batches' : Batch::find($batch_id)->name;
        \DB::statement("SET SQL_MODE=''");
        $paymnets= BatchStudent::with('User')
            ->when(!empty($request->batch_id) , function ($query) use($request){
            return $query->where('batch_id',$request->batch_id);
            })
            ->selectRaw('*, SUM(paymented_amount) as total_ammount, COUNT(DISTINCT batch_id)  as batch_count')
            ->groupBy('student_id')
            ->orderBy('student_id', 'asc')
            ->get();
        return view('backend.pages.account.income.incomeStatement', compact(['generalSettings','batch_name','paymnets']));
    }
    //test for 50% payment
    public function create2($user_id, $batch_id)
    {
        $course_fee = null;
        $totall_course_fee = null;
        $coupon_code = null;
        $user_id = $user_id;
        $batch_id = $batch_id;
        $students = BatchStudent::with(['user','Student'])->where('user_id',$user_id)->where('batch_students.batch_id',$batch_id)->get();

        //paymented fied check from batchStudent
        $paymentedAmountCheck = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('course_fee')->first();
        $fixedCourseFee = CourseFee::where('batch_id',$batch_id)->get()->pluck('course_fee')->first();

        $due_course_fee = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('due_amount')->first();

        return view('backend.pages.payment.offline.create_v2',compact('students','fixedCourseFee','coupon_code','course_fee','due_course_fee','paymentedAmountCheck'));
    }

    public function store2(Request $request)
    {
        //dd($request);
        $this->validate(
            $request,
            [
                'user_id' => 'required',
                'student_id' => 'required',
                'batch_id' => 'required',
                'course_fee' => 'nullable',
                'paymented_amount' => 'required|integer|min:0',
                'coupon_code' => 'nullable',
                'due_amount' => 'nullable',
                'payment_method' => 'required',
                'payment_date' => 'required',
                'description' => 'nullable'
            ],
        );
        $id = $request->user_id;
        $batch_id = $request->batch_id;
        $course_fee = $request->course_fee;
        $coupon_code = $request->coupon_code;
        $dueCheck = BatchStudent::where('user_id',$id)->where('batch_id', $batch_id)->get()->pluck('due_amount')->first();
        $paymented_amount = $request->paymented_amount;
        $upto =($dueCheck/2);
        if($dueCheck < $paymented_amount and $dueCheck != NULL and $dueCheck == 0){
            return back()->with('warning', 'Please check your due amount.');
        }
        elseif($dueCheck < $paymented_amount and $dueCheck != NULL){
            return back()->with('warning', 'Please check your due amount.');
        }
        elseif($paymented_amount > $course_fee ){
            return back()->with('warning', 'Please check your total amount.');
        }
        elseif($paymented_amount > $course_fee and $coupon_code != null ){
            return back()->with('warning', 'Please check your total amount.');
        }
        elseif($paymented_amount < $upto ){
            return back()->with('warning', 'Payment amount must be 50% or up.');
        }
        else {exit();
        $collectFees = new PaymentHistory();
        $collectFees->user_id = $request->user_id;
        $collectFees->student_id = $request->student_id;
        $collectFees->batch_id = $request->batch_id;
        $collectFees->paymented_amount = $request->paymented_amount;
        $collectFees->coupon_code = $request->coupon_code;
        $collectFees->payment_method = $request->payment_method;
        $collectFees->payment_date = $request->payment_date;
        $collectFees->description = $request->description;
        $collectFees->save();

        //user_coupons table data insert
        $coupon_code = $request->coupon_code;
        $coupon_id = Coupon::where('name',$coupon_code)->get()->pluck('id')->first();
        $coupon_status = Coupon::where('name',$coupon_code)->get()->pluck('use_status')->first();
        if($coupon_code != null){
            $user_coupon = DB::table('user_coupon')->insert([
                   'user_id' => $request->user_id,
                   'student_id' => $request->student_id,
                   'coupon_id' => $coupon_id,
                   'description' => $request->description
            ]);
        }
        //coupons table status update
        if($coupon_id != null){
        $coupon = Coupon::find($coupon_id);
        $coupon->use_status = '1';
        $coupon->save();
        }
        //batch_students table course fee,paymented-amount,due update
        $batches_id = BatchStudent::where('user_id',$id)->where('batch_id',$batch_id)->get()->pluck('id')->first();
        $total_payment_amount = PaymentHistory::where('user_id',$id)->where('batch_id',$batch_id)->get()->sum("paymented_amount");
        $totall_course_fee = BatchStudent::where('user_id',$id)->where('batch_id', $batch_id)->get()->pluck('course_fee')->first();
        $discount_amount = Coupon::where('id',$coupon_id)->get()->pluck('discount_amount')->first();
        // $totall_course_fee = $request->totall_course_fee;
        if($course_fee == null ){
        $batchStudent = BatchStudent::find($batches_id);
        $batchStudent->course_fee = $totall_course_fee;
        $batchStudent->paymented_amount = $total_payment_amount;
        $paymented_amount = $batchStudent->paymented_amount = $total_payment_amount;
        $due_amount = ($totall_course_fee - $paymented_amount);
        $batchStudent->due_amount = $due_amount;
        $batchStudent->save();
        }//newtest
        elseif($course_fee == null and $coupon_id !=null){
        $batchStudent = BatchStudent::find($batches_id);
        $batchStudent->course_fee = $totall_course_fee - $discount_amount;
        $batchStudent->paymented_amount = $total_payment_amount;
        $course_fees = $batchStudent->course_fee = $totall_course_fee - $discount_amount;
        $paymented_amount = $batchStudent->paymented_amount = $total_payment_amount;
        $due_amount = ($course_fees - $paymented_amount);
        $batchStudent->due_amount = $due_amount;
        $batchStudent->save();
        }
        // elseif($paymented_amount < $total_payment_amount and $coupon_id !=null){
        // $batchStudent = BatchStudent::find($batches_id);
        // $batchStudent->course_fee = $request->course_fee;
        // $batchStudent->paymented_amount = $total_payment_amount;
        // $paymented_amount = $batchStudent->paymented_amount = $total_payment_amount;
        // $due_amount = ($course_fee - $paymented_amount);
        // $batchStudent->due_amount = $due_amount;
        // $batchStudent->save();
        else{
        $batchStudent = BatchStudent::find($batches_id);
        $batchStudent->course_fee = $request->course_fee;
        $batchStudent->paymented_amount = $total_payment_amount;
        $paymented_amount = $batchStudent->paymented_amount = $total_payment_amount;
        $due_amount = ($course_fee - $paymented_amount);
        $batchStudent->due_amount = $due_amount;
        $batchStudent->save();
        }
        // $user->syncRoles([3]);
        // $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();
        // if (is_array($role_permissions) && count($role_permissions)) {
        //     $user->syncPermissions($role_permissions);
        // }

        return redirect()->route('admin.collectFees.indexIndividual',[$id,$batch_id])->with('success', ('Payment Successfull'));
     }
    }
    public function create3($user_id, $batch_id)
    {
        $course_fee = null;
        $totall_course_fee = null;
        $coupon_code = null;
        $user_id = $user_id;
        $batch_id = $batch_id;
        $students = BatchStudent::with(['user','Student'])->where('user_id',$user_id)->where('batch_students.batch_id',$batch_id)->get();

        //paymented fied check from batchStudent
        $paymentedAmountCheck = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('course_fee')->first();
        $fixedCourseFee = CourseFee::where('batch_id',$batch_id)->get()->pluck('course_fee')->first();

        $due_course_fee = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('due_amount')->first();

        return view('backend.pages.payment.offline.create_v3',compact('students','fixedCourseFee','coupon_code','course_fee','due_course_fee','paymentedAmountCheck'));
    }

    public function create4($user_id, $batch_id)
    {
        $course_fee = null;
        $totall_course_fee = null;
        $coupon_code = null;
        $user_id = $user_id;
        $batch_id = $batch_id;
        $students = BatchStudent::with(['user','Student'])->where('user_id',$user_id)->where('batch_students.batch_id',$batch_id)->get();

        //paymented fied check from batchStudent
        $paymentedAmountCheck = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('course_fee')->first();
        $fixedCourseFee = CourseFee::where('batch_id',$batch_id)->get()->pluck('course_fee')->first();

        $due_course_fee = BatchStudent::where('user_id',$user_id)->where('batch_id',$batch_id)->get()->pluck('due_amount')->first();

        return view('backend.pages.payment.offline.create_v4',compact('students','fixedCourseFee','coupon_code','course_fee','due_course_fee','paymentedAmountCheck'));
    }
    public function store4(Request $request)
    {

        $this->validate(
            $request,
            [
                'user_id' => 'required',
                'student_id' => 'required',
                'batch_id' => 'required',
                'course_fee' => 'nullable',
                'paymented_amount' => 'required|integer|min:0',
                'coupon_code' => 'nullable',
                'due_amount' => 'nullable',
                'payment_method' => 'required',
                'payment_date' => 'required',
                'commitment_date' => 'nullable',
                'description' => 'nullable'
            ],
        );
        $id = $request->user_id;
        $batch_id = $request->batch_id;
        $course_fee = $request->course_fee;
        $coupon_code = $request->coupon_code;
        $dueCheck = BatchStudent::where('user_id',$id)->where('batch_id', $batch_id)->get()->pluck('due_amount')->first();
        $paymented_amount = $request->paymented_amount;
        if($coupon_code == NULL and $dueCheck < $paymented_amount  and $dueCheck != NULL){
            return back()->with('warning', 'Please check your due amount.');
        }
        elseif($dueCheck < $paymented_amount and $dueCheck != NULL){
            return back()->with('warning', 'Please check your due amount.');
        }
        elseif($dueCheck < $paymented_amount and $dueCheck == 0){
            return back()->with('warning', 'Please check your due amount.');
        }
        elseif($paymented_amount > $course_fee ){
            return back()->with('warning', 'Please check your total amount.');
        }
        elseif($paymented_amount > $course_fee and $coupon_code != null ){
            return back()->with('warning', 'Please check your total amount.');
        }
        elseif($coupon_code != null and $paymented_amount < $course_fee ){
            return back()->with('warning', 'Please pay full amount.');
        }

        elseif($coupon_code != null and $paymented_amount > $course_fee ){
            return back()->with('warning', 'Please pay full amount.');
        } 
        // elseif($coupon_code != null and $paymented_amount == $course_fee ){
        //     $collectFees = new PaymentHistory();
        //     $collectFees->user_id = $request->user_id;
        //     $collectFees->student_id = $request->student_id;
        //     $collectFees->batch_id = $request->batch_id;
        //     $collectFees->paymented_amount = $request->paymented_amount;
        //     $collectFees->coupon_code = $request->coupon_code;
        //     $collectFees->payment_method = $request->payment_method;
        //     $collectFees->payment_date = $request->payment_date;
        //     $collectFees->description = $request->description;
        //     $collectFees->save();
        // }    
        else{

        // $collectFees = new PaymentHistory();
        // $collectFees->user_id = $request->user_id;
        // $collectFees->student_id = $request->student_id;
        // $collectFees->batch_id = $request->batch_id;
        // $collectFees->paymented_amount = $request->paymented_amount;
        // $collectFees->coupon_code = $request->coupon_code;
        // $collectFees->payment_method = $request->payment_method;
        // $collectFees->payment_date = $request->payment_date;
        // $collectFees->description = $request->description;
        // $collectFees->save();

        //user_coupons table data insert
        $coupon_code = $request->coupon_code;
        $coupon_id = Coupon::where('name',$coupon_code)->get()->pluck('id')->first();
        $coupon_status = Coupon::where('name',$coupon_code)->get()->pluck('use_status')->first();
        if($coupon_code != null){
            $user_coupon = DB::table('user_coupon')->insert([
                   'user_id' => $request->user_id,
                   'student_id' => $request->student_id,
                   'coupon_id' => $coupon_id,
                   'description' => $request->description
            ]);
        }
        //coupons table status update
        if($coupon_id != null){
        $coupon = Coupon::find($coupon_id);
        $coupon->use_status = '1';
        $coupon->save();
        }
        //batch_students table course fee,paymented-amount,due update
        $batches_id = BatchStudent::where('user_id',$id)->where('batch_id',$batch_id)->get()->pluck('id')->first();
        $tpy= BatchStudent::where('user_id',$id)->where('batch_id',$batch_id)->get()->pluck("paymented_amount")->first();
        $total_payment_amount = PaymentHistory::where('user_id',$id)->where('batch_id',$batch_id)->get()->sum("paymented_amount");
        $totall_course_fee = BatchStudent::where('user_id',$id)->where('batch_id', $batch_id)->get()->pluck('course_fee')->first();
        $discount_amount = Coupon::where('id',$coupon_id)->get()->pluck('discount_amount')->first();
        // $totall_course_fee = $request->totall_course_fee;
        if($course_fee !=null and $coupon_id !=null){
        $batchStudent = BatchStudent::find($batches_id);
        $batchStudent->course_fee = $totall_course_fee - $discount_amount;
        $batchStudent->paymented_amount = $request->paymented_amount + $tpy;
        $batchStudent->due_amount = $batchStudent->course_fee - $batchStudent->paymented_amount;
        $batchStudent->save();
        
        $collectFees = new PaymentHistory();
        $collectFees->user_id = $request->user_id;
        $collectFees->student_id = $request->student_id;
        $collectFees->batch_id = $request->batch_id;
        $collectFees->paymented_amount = $request->paymented_amount;
        $collectFees->coupon_code = $request->coupon_code;
        $collectFees->payment_method = $request->payment_method;
        $collectFees->payment_date = $request->payment_date;
        $collectFees->description = $request->description;
        $collectFees->save();
        }
        // elseif($course_fee == null ){
        // $batchStudent = BatchStudent::find($batches_id);
        // $batchStudent->course_fee = $totall_course_fee;
        // $batchStudent->paymented_amount = $total_payment_amount;
        // $paymented_amount = $batchStudent->paymented_amount = $total_payment_amount;
        // $due_amount = ($totall_course_fee - $paymented_amount);
        // $batchStudent->due_amount = $due_amount;
        // $batchStudent->save();
        // }//newtest
        // elseif($course_fee == null and $coupon_id !=null){
        // $batchStudent = BatchStudent::find($batches_id);
        // $batchStudent->course_fee = $totall_course_fee - $discount_amount;
        // $batchStudent->paymented_amount = $total_payment_amount;
        // $course_fees = $batchStudent->course_fee = $totall_course_fee - $discount_amount;
        // $paymented_amount = $batchStudent->paymented_amount = $total_payment_amount;
        // $due_amount = ($course_fees - $paymented_amount);
        // $batchStudent->due_amount = $due_amount;
        // $batchStudent->save();
        // }
        else{
        // $batchStudent = BatchStudent::find($batches_id);
        // $batchStudent->course_fee = $request->course_fee;
        // $batchStudent->paymented_amount = $request->paymented_amount;
        // $paymented_amount = $batchStudent->paymented_amount = $total_payment_amount;
        // $due_amount = ($course_fee - $paymented_amount);
        // $batchStudent->due_amount = $due_amount;
        // $batchStudent->save();
        }
        // $user->syncRoles([3]);
        // $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();
        // if (is_array($role_permissions) && count($role_permissions)) {
        //     $user->syncPermissions($role_permissions);
        // }

        return redirect()->route('admin.collectFees.indexIndividual',[$id,$batch_id])->with('success', ('Payment Successfull'));
     }
    }
}
