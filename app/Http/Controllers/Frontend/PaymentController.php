<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Backend\ReferCount;
use App\Models\Backend\ReferralBonus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Backend\Transaction;
use Ixudra\Curl\Facades\Curl;
use App\Models\Backend\Student;
use App\Models\Backend\Batch;
use App\Models\Backend\MoodleData;
use App\Models\Backend\GenaralSettings;
use App\Models\Backend\BatchStudent;
use App\Models\Backend\Course;
use App\Models\Backend\Subject;
use App\Models\Backend\PaymentHistory;
use App\Models\Backend\Coupon;
use App\Models\Backend\TransactionIpn;
use App\Models\Frontend\TempStudent;
use App\Models\Frontend\CashOnPayment;
use App\Notifications\UserRegisteredNotification;
use App\Models\Frontend\SpOrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use shurjopay\ShurjopayLaravelPackage\Models\Sporder;
use App\Sporder;
use shurjopay\ShurjopayLaravelPackage\Models\Spsetup;
use Illuminate\Support\Facades\DB;
use App\Mail\EmailVerification;
use Illuminate\Mail\Mailable;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\File;
use App\Models\Frontend\Bkash_order;
use App\User;
use App\Role;


class PaymentController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public $var;

    public function registration(request $request){

      $student_count = Student::get()->count('id') + 1;
      $student_id = date('y') .$request->exam_type.$request->exam. str_pad($student_count, 4, '0', STR_PAD_LEFT);
      $tempStudent = new TempStudent();
      $tempStudent->student_id = $student_id;
      $tempStudent->first_name = $request->first_name;
      $tempStudent->last_name = $request->last_name;
      $tempStudent->phone = $request->phone;
      $tempStudent->email = $request->email;
      $tempStudent->password = $request->password;
      $tempStudent->courseCategory = $request->exam_type;
      $tempStudent->course_name = $request->exam;
      $tempStudent->batch_name = implode(",",$request->subject_id);
      $tempStudent->course_fee = $request->course_fee;
      $tempStudent->payment_amount = $request->course_fee;
      $tempStudent->user_type = 'Student';
      $tempStudent->user_role = '3';
      $tempStudent->admission_date = $request->date;
      $tempStudent->status = 'unpaid';
      $tempStudent->save();

      $name = $request->first_name.''.$request->last_name;

      if($tempStudent->course_fee>'0'){

        $cancel_url  = route('admission.form.registration.frontendCancel-url');
        $return_url  = route('admission.form.registration.frontendReturn-url');

        $info = array(
        'store_id' => 479,
        'prefix' => "THE",
        'currency' => "BDT",
        'return_url' => $return_url,
        'cancel_url' => $cancel_url,
        'amount' => $request->course_fee,
        'order_id' => "101",
        'discount_amount' => 0,
        'disc_percent' => 0,
        'client_ip' => "192.01.22.02",
        'customer_name' => $name,
        'customer_phone' => $request->phone,
        'customer_email' => $request->email,
        'customer_address' => "bangladesh",
        'customer_city' => "BD",
        'customer_country' => "bangladesh",
        'value_a' => $request->exam_type,
        'value_b' => $request->exam,
        'value_c' => $student_id,
        'value_d' => $tempStudent->batch_name,
        );

        $this->checkout($info,$store_id=0);
        dd($info);

     }else{

        $name = $request->first_name.' '.$request->last_name;

        $user = new User();
        $user->name = $name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->raw_password = $request->password;
        $user->student_id = $student_id;
        $user->user_type = 'Student';
        $user->save();

        $student = new Student();
        $student->user_id = $user->id;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->student_id = $student_id;
        $student->save();
        $user_id = $user->id;

        $user->syncRoles([3]);
        $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();
        if (is_array($role_permissions) && count($role_permissions)) {
            $user->syncPermissions($role_permissions);
        }

        $tempId = TempStudent::where('student_id',$user->student_id)->latest()->pluck('id')->first();
        $tempStudent = TempStudent::find($tempId);
        $tempStudent->user_id = $user->id;
        $tempStudent->status = 'Free';
        $tempStudent->save();

        $temp = TempStudent::latest()->pluck('batch_name')->first();
        $array= preg_split("/[,]/",$temp);
        $user->subjectUser()->attach($array);

        $this->toMail($user_id);
        $this->submit_customer_data($tempStudent);
        // $number = $request->phone;
        // $text =;
        // $this->sendsms($number,$text);
        // $this->submit_customer_data($tempStudent);

          return view ('frontend.pages.validation');
      }
    }

    public function frontendReturn($id=null,$store_id=0)
    {

        $actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $query_str = parse_url($actual_link, PHP_URL_QUERY);
       parse_str($query_str, $query_params);
       // dd( $query_params['order_id']);
       $id=$query_params['order_id'];
        $orderID =$id; //$query_params['order_id'];

        $response=$this->verify($orderID,$store_id);


        $object = Sporder::where('order_id',$orderID)->first();

        $object->response=$response;

        $arr=json_decode($response);

        if(!empty($arr[0]->sp_code))
        {
            if(!empty($arr[0]->bank_trx_id))
            {
                $bank=($arr[0]->bank_trx_id);
                $object->bank_trx_id=$bank;


            }
            $object->status =$arr[0]->sp_code;
            $object->save();

            $arra = json_decode($object->response);
            $resposeDetails = new SpOrderDetail();
            $resposeDetails->order_id = $arra[0]->order_id;
            $resposeDetails->currency = $arra[0]->currency;
            $resposeDetails->amount = $arra[0]->amount;
            $resposeDetails->payable_amount = $arra[0]->payable_amount;
            $resposeDetails->discsount_amount = $arra[0]->discsount_amount;
            $resposeDetails->disc_percent = $arra[0]->disc_percent;
            $resposeDetails->usd_amt = $arra[0]->usd_amt;
            $resposeDetails->usd_rate = $arra[0]->usd_rate;
            $resposeDetails->card_holder_name = $arra[0]->card_holder_name;
            $resposeDetails->card_number = $arra[0]->card_number;
            $resposeDetails->phone_no = $arra[0]->phone_no;
            $resposeDetails->bank_trx_id = $arra[0]->bank_trx_id;
            $resposeDetails->invoice_no = $arra[0]->invoice_no;
            $resposeDetails->bank_status = $arra[0]->bank_status;
            $resposeDetails->customer_order_id = $arra[0]->customer_order_id;
            $resposeDetails->sp_code = $arra[0]->sp_code;
            $resposeDetails->sp_massage = $arra[0]->sp_massage;
            $resposeDetails->name = $arra[0]->name;
            $resposeDetails->email = $arra[0]->email;
            $resposeDetails->address = $arra[0]->address;
            $resposeDetails->city = $arra[0]->city;
            $resposeDetails->transaction_status = $arra[0]->transaction_status;
            $resposeDetails->method = $arra[0]->method;
            $resposeDetails->date_time = $arra[0]->date_time;
            $resposeDetails->save();

            $inv_no=$arr[0]->customer_order_id;
            /*     print_r($object);
                 exit()*/;
           // $actual_link = env('MERCHANT_RETURN_URL')."/".$inv_no;
            // return $response;
           // dd($object);
           if($object->status==1000){
             $tempId = TempStudent::where('student_id',$object->value_3)->latest()->pluck('id')->first();

              $first_name = TempStudent::where('id',$tempId)->latest()->pluck('first_name')->first();
              $last_name = TempStudent::where('id',$tempId)->latest()->pluck('last_name')->first();

              $user = new User();
              $user->name = $first_name.' '.$last_name;
              $user->phone = TempStudent::where('id',$tempId)->latest()->pluck('phone')->first();
              $user->email = TempStudent::where('id',$tempId)->latest()->pluck('email')->first();
              $user->password = TempStudent::where('id',$tempId)->latest()->pluck('password')->first();
              $user->raw_password = TempStudent::where('id',$tempId)->latest()->pluck('password')->first();
              $user->student_id = $object->value_3;
              $user->user_type = 'Student';
              $user->save();

              $tempStudent = TempStudent::find($tempId);
              $tempStudent->user_id = $user->id;
              $tempStudent->status = 'paid';
              $tempStudent->save();

              $student = new Student();
              $student->user_id = $user->id;
              $student->first_name = $first_name;
              $student->last_name = $last_name;
              $student->student_id = $object->value_3;
              $student->save();
              $user_id = $user->id;

              $user->syncRoles([3]);
              $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();
              if (is_array($role_permissions) && count($role_permissions)) {
                  $user->syncPermissions($role_permissions);
              }

              // $subject_id = TempStudent::where('id',$tempId)->latest()->pluck('batch_name')->first();

              $temp = TempStudent::where('id',$tempId)->get()->pluck('batch_name')->first();
              $array= preg_split("/[,]/",$temp);
              $user->subjectUser()->attach($array);

              $paymentHistory = new PaymentHistory();
              $paymentHistory->user_id = $user_id;
              $paymentHistory->student_id = $object->value_3;
              $paymentHistory->batch_id = implode(',', $array);
              $paymentHistory->paymented_amount = TempStudent::where('id',$tempId)->latest()->pluck('course_fee')->first();
              //$paymentHistory->coupon_code = $tempStudent->coupon_code;
              $paymentHistory->payment_method = 'online';
              $paymentHistory->payment_date = date('d-m-Y');
              $paymentHistory->transaction_id = $object->bank_trx_id;
              $paymentHistory->save();


              $this->submit_customer_data($tempStudent);
              $this->toMail($user_id);

              return view ('frontend.pages.validation');
           }else{
             return redirect()->route('frontend.showAdmissionForm')->with('warning','Payment & Registration Failed!!! Try again later...');
           }

        }
        else{
            return redirect()->route('frontend.showAdmissionForm')->with('warning','Payment & Registration Failed!!! Try again later...');
            // echo $response;
            // exit();
        }

       // return redirect($actual_link);

    }

    public function frontendCancel(){

      return redirect()->route('frontend.showAdmissionForm')->with('warning','Payment cancel & Registration failed !!!');
    }

    public function paymentByStudent(Request $request)
    {
        // dd($request->all());
        $pre_subjects = DB::table('subject_user')->where('user_id', $request->user_id)->where('status',1)->get()->pluck('subject_id')->toArray();

        $commonValue = array_intersect($pre_subjects, $request->subject_id);

        if (!empty($commonValue)) {
           return redirect()->back()->with('warning','This subject has already been purchased...Please check and try again.');

        }

        $this->var = $request;
        $this->tempStore();

        $uId = User::where('id',$request->user_id)->pluck('id')->first();
        $student_count = Student::get()->count('id') + 1;
        $student_id = date('y') .$request->courseCategory.$request->course_name. str_pad($student_count, 4, '0', STR_PAD_LEFT);
        $name = User::where('id',$request->user_id)->pluck('name')->first();
        $phone = User::where('id',$request->user_id)->pluck('phone')->first();
        $email = User::where('id',$request->user_id)->pluck('email')->first();

        if($request->course_fee=='0'){

          $user_id = TempStudent::where('student_id',$student_id)->latest()->pluck('user_id')->first();
          $tempId = TempStudent::where('user_id',$user_id)->latest()->pluck('id')->first();
          $tempStudent = TempStudent::find($tempId);
          $tempStudent->status = 'paid';
          $tempStudent->save();

          $sId = Student::where('user_id',$user_id)->pluck('id')->first();
          $student = Student::find($sId);
          $student->student_id = $student_id;
        //   $student->student_batch_id = $tempStudent->student_batch_id;
          $student->save();

          $available_seat = Batch::where('id',$request->student_batch_id)->get()->pluck('available_seat')->first()-1;
          $batchSeat = Batch::find($request->student_batch_id);
          $batchSeat->available_seat = $available_seat;
          $batchSeat->save();

          $temp = TempStudent::latest()->pluck('batch_name')->first();
          $array= preg_split("/[,]/",$temp);
          $uId = User::where('id',$user_id)->pluck('id')->first();
          $user = User::find($uId);
          $user->student_id = $student_id;
          $user->save();
          $user->subjectUser()->attach($array);

          $batchStudnt = new BatchStudent();
          $batchStudnt->user_id = $user_id;
          $batchStudnt->student_id = $student_id;
          $batchStudnt->course_id = $tempStudent->course_name;
          $batchStudnt->batch_id = $tempStudent->student_batch_id;
          $batchStudnt->admission_date = $tempStudent->admission_date;
          $batchStudnt->course_fee = $tempStudent->course_fee;
          $batchStudnt->paymented_amount = $tempStudent->payment_amount;
          $batchStudnt->save();

          $this->submit_customer_data($tempStudent);
          return redirect()->route('admin.dashboard')->with('success','Free Exam Successfully Assign done!');
          $email=User::where('id',$user_id)->pluck('email')->first();
          $password=User::where('id',$user_id)->pluck('raw_password')->first();

          if ( Auth::attempt(array('email' => $email, 'password' => $password), true) ) {
              return redirect()->route('admin.dashboard')->with('success','Free Exams Successfully Assign done!');
          } else {
              return redirect()->route('admin.dashboard')->with('success','Invalid login credentials!');
          }
        }

        $cancel_url  = route('admission.form.payment.cancel-url');
        $return_url  = route('admission.form.payment.return-url');

        $info = array(
            'store_id' => 479,
            'prefix' => "THE",
        'currency' => "BDT",
        'return_url' => $return_url,
        'cancel_url' => $cancel_url,
        'amount' => $request->course_fee,
        'order_id' => "101",
        'discount_amount' => 0,
        'disc_percent' => 0,
        'client_ip' => "",
        'customer_name' => $name,
        'customer_phone' => $phone,
        'customer_email' => $email,
        'customer_address' => "bangladesh",
        'customer_city' => "BD",
        'customer_country' => "bangladesh",
        'value_a' => $request->courseCategory,
        'value_b' => $request->course_name,
        'value_c' => $student_id,
        'value_d' => $request->subject_id,
        );

        $this->checkout($info,$store_id=0);
    }

    //$store_id is not required param for single vendored application
    public function checkout($info,$store_id=0){

        $flag=0;
        if(!isset($info['prefix']))
        {
            $flag=1;
            echo 'Please provide Prefix';
        }
        if(!isset($info['amount']))
        {
            $flag=2;
            echo 'Please provide amount';

        }
        if(!isset($info['order_id']))
        {
            $flag=3;
            echo 'Please provide order id';

        }
        if(!isset($info['customer_name']))
        {
            $flag=4;
            echo 'Please provide customer name';

        }
        if(!isset($info['customer_phone']))
        {
            $flag=5;
            echo 'Please provide customer phone';

        }
        if(!isset($info['customer_address']))
        {
            $flag=6;
            echo 'Please provide customer address';

        }
        if(!isset($info['store_id']))
        {
            $flag=7;
            echo 'Please provide store_id';

        }
        if($flag==0)
        {
            if($store_id==0)
            {
                $response = $this->getUrl($info);
            }
            else
            {
                $response = $this->getUrl($info,$store_id);
            }

            $arr = json_decode($response);

            if(!empty($arr->checkout_url))
            {

                $url = ($arr->checkout_url);

                $order_id = ($arr->sp_order_id);
                $order = new Sporder();
                $order->bank_trx_id = $order_id.rand(10000,99999) ;
                $order->order_id = $order_id ;
                $order->response = 0;

                $order->amount = $info['amount'];
                $order->inv_id = $info['order_id'];
                $order->status =0;
                $order->discount_amount = $info['discount_amount'];
                $order->customer_name = $info['customer_name'];
                $order->customer_phone = $info['customer_phone'];
                $order->customer_email = $info['customer_email'];
                $order->customer_address = $info['customer_address'];
                $order->client_ip = $info['client_ip'];
                $order->value_1 = $info['value_a'];
                $order->value_2 = $info['value_b'];
                $order->value_3 = $info['value_c'];
                // $order->value_4 = $info['value_d'];
                $order->save();

                echo "<script>window.location.replace('$url')</script>";
            }
            else{
                return $response;
            }

        }
    }

    private function getToken($store_id=0) {

        $userExists=false;

        if($store_id==0)
        {
            if(!empty(env('MERCHANT_USERNAME')) && !empty(env('MERCHANT_PASSWORD')))
            {
                $user= env('MERCHANT_USERNAME');
                $pass= env('MERCHANT_PASSWORD');
                $userExists=true;
            }

        }
        else
        {
            $data=Spsetup::where('store_id',$store_id)->get();
            if(!empty($data[0]->username) && !empty($data[0]->username) )
            {
                $user= $data[0]->username;
                $pass= $data[0]->password;
                $userExists=true;
            }
        }
        if($userExists)
        {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                // CURLOPT_URL => 'https://sandbox.shurjopayment.com/api/get_token',
                CURLOPT_URL => 'https://engine.shurjopayment.com/api/get_token',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                                            "username": "'.$user.'",
                                            "password": "'.$pass.'"
                                        }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
                CURLOPT_SSL_VERIFYHOST => FALSE,
                CURLOPT_SSL_VERIFYPEER => FALSE,
            ));

            $response = curl_exec($curl);


            curl_close($curl);
        }
        else
        {
            $response="Please enter valid username and password";
        }

        return $response;
    }

    private function getUrl($info,$store_id=0) {

      if($store_id==0){

            $response=$this->getToken();

        }else{
            $response=$this->getToken($store_id);

        }

        $arr=json_decode($response);

        if(!empty($arr->token))
        {
            $tok=($arr->token);
            $s_id=($arr->store_id);

            $info2=array(
                'token'=>$tok,
                'store_id'=>$s_id);
            $final_array=array_merge($info2, $info);
            dd($final_array);
            $bodyJson=json_encode($final_array);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                // CURLOPT_URL => 'https://sandbox.shurjopayment.com/api/secret-pay',
                CURLOPT_URL => 'https://engine.shurjopayment.com/api/secret-pay',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>$bodyJson,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
                CURLOPT_SSL_VERIFYHOST => FALSE,
                CURLOPT_SSL_VERIFYPEER => FALSE,
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
                exit();
            }else{
                return $response;
            }

        }
        else{
            return $response;
        }

    }

    private function verify($order_id,$store_id=0) {

        $order_id = array(
            'order_id' => $order_id);

        $order_id=json_encode($order_id);

        $response=$this->getToken($store_id);

        $arr=json_decode($response);

        if(!empty($arr->token))
        {
            $tok=($arr->token);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                // CURLOPT_URL => 'https://sandbox.shurjopayment.com/api/verification',
                CURLOPT_URL => 'https://engine.shurjopayment.com/api/verification',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>$order_id
            ,
                CURLOPT_HTTPHEADER => array(
                    'Authorization:Bearer '.$tok,
                    'Content-Type: application/json'
                ),
                CURLOPT_SSL_VERIFYHOST => FALSE,
                CURLOPT_SSL_VERIFYPEER => FALSE,
            ));

            $response = curl_exec($curl);

            curl_close($curl);
        }


        return $response;

    }

    public function return($id=null,$store_id=0)
    {

        $actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $query_str = parse_url($actual_link, PHP_URL_QUERY);
       parse_str($query_str, $query_params);
       // dd( $query_params['order_id']);
       $id=$query_params['order_id'];
        $orderID =$id; //$query_params['order_id'];

        $response=$this->verify($orderID,$store_id);


        $object = Sporder::where('order_id',$orderID)->first();

        $object->response=$response;

        $arr=json_decode($response);
        if(!empty($arr[0]->sp_code))
        {
            if(!empty($arr[0]->bank_trx_id))
            {
                $bank=($arr[0]->bank_trx_id);
                $object->bank_trx_id=$bank;


            }
            $object->status =$arr[0]->sp_code;
            $object->save();

            $arr = json_decode($object->response);
            $resposeDetails = new SpOrderDetail();
            $resposeDetails->order_id = $arr[0]->order_id;
            $resposeDetails->currency = $arr[0]->currency;
            $resposeDetails->amount = $arr[0]->amount;
            $resposeDetails->payable_amount = $arr[0]->payable_amount;
            $resposeDetails->discsount_amount = $arr[0]->discsount_amount;
            $resposeDetails->disc_percent = $arr[0]->disc_percent;
            $resposeDetails->usd_amt = $arr[0]->usd_amt;
            $resposeDetails->usd_rate = $arr[0]->usd_rate;
            $resposeDetails->card_holder_name = $arr[0]->card_holder_name;
            $resposeDetails->card_number = $arr[0]->card_number;
            $resposeDetails->phone_no = $arr[0]->phone_no;
            $resposeDetails->bank_trx_id = $arr[0]->bank_trx_id;
            $resposeDetails->invoice_no = $arr[0]->invoice_no;
            $resposeDetails->bank_status = $arr[0]->bank_status;
            $resposeDetails->customer_order_id = $arr[0]->customer_order_id;
            $resposeDetails->sp_code = $arr[0]->sp_code;
            $resposeDetails->sp_massage = $arr[0]->sp_massage;
            $resposeDetails->name = $arr[0]->name;
            $resposeDetails->email = $arr[0]->email;
            $resposeDetails->address = $arr[0]->address;
            $resposeDetails->city = $arr[0]->city;
            $resposeDetails->transaction_status = $arr[0]->transaction_status;
            $resposeDetails->method = $arr[0]->method;
            $resposeDetails->date_time = $arr[0]->date_time;
            $resposeDetails->save();

            $inv_no=$arr[0]->customer_order_id;
            /*     print_r($object);
                 exit()*/;
           // $actual_link = env('MERCHANT_RETURN_URL')."/".$inv_no;
            // return $response;

           if($object->status==1000){
             $user_id = TempStudent::where('student_id',$object->value_3)->latest()->pluck('user_id')->first();
             $tempId = TempStudent::where('user_id',$user_id)->latest()->pluck('id')->first();
             $tempStudent = TempStudent::find($tempId);
             $tempStudent->status = 'paid';
             $tempStudent->save();

             $sId = Student::where('user_id',$user_id)->pluck('id')->first();
             $student = Student::find($sId);
             $student->student_id = $object->value_3;
            //  $student->student_batch_id = $tempStudent->student_batch_id;
             $student->save();

             $available_seat = Batch::where('id',$tempStudent->student_batch_id)->get()->pluck('available_seat')->first()-1;
             $batchSeat = Batch::find($tempStudent->student_batch_id);
             $batchSeat->available_seat = $available_seat;
             $batchSeat->save();

             $batchStudnt = new BatchStudent();
             $batchStudnt->user_id = $user_id;
             $batchStudnt->student_id = $student->student_id;
             $batchStudnt->course_id = $tempStudent->course_name;
             $batchStudnt->batch_id = $tempStudent->student_batch_id;
             $batchStudnt->admission_date = $tempStudent->admission_date;
             $batchStudnt->course_fee = $tempStudent->course_fee;
             $batchStudnt->paymented_amount = $tempStudent->payment_amount;
             $batchStudnt->save();

             $temp = TempStudent::latest()->pluck('batch_name')->first();
             $array= preg_split("/[,]/",$temp);
             $uId = User::where('id',$user_id)->pluck('id')->first();
             $user = User::find($uId);
             $user->student_id = $object->value_3;
             $user->save();
             $user->subjectUser()->attach($array);

             $paymentHistory = new PaymentHistory();
             $paymentHistory->user_id = $user_id;
             $paymentHistory->student_id = $object->value_3;
             $paymentHistory->batch_id = $object->value_2;
             $paymentHistory->paymented_amount = $tempStudent->course_fee;
             $paymentHistory->student_batch_id = $tempStudent->student_batch_id;
             $paymentHistory->coupon_code = $tempStudent->coupon_code;
             $paymentHistory->payment_method = 'online';
             $paymentHistory->payment_date = date('d-m-Y');
             $paymentHistory->transaction_id = $object->bank_trx_id;
             $paymentHistory->save();

             $this->submit_customer_data($tempStudent);
             $email=User::where('id',$user_id)->pluck('email')->first();
             $password=User::where('id',$user_id)->pluck('raw_password')->first();

            $u = auth()->user();
            $c=ReferralBonus::where('course_id','=',$tempStudent->course_name)->first();
            if ($c) {
                $refer_count = new ReferCount();
                $refer_count->user_id = auth()->user()->id;
                $refer_count->used_refer_code = $u->used_refer_code;
                $refer_count->amount = $c->referral_bonus;
                $refer_count->save();
            }

             return redirect()->route('admin.dashboard')->with('success','Payment Success & Exam Assign Done.');
           }else{
             return redirect()->route('admin.dashboard')->with('warning','Payment Failed!!! Try again later...');
           }

        }
        else{
            // dd($response);
            // echo $response;
            // exit();
            return redirect()->route('admin.dashboard')->with('warning','Payment failed !!!');
        }

       // return redirect($actual_link);

    }

    public function cancel(){

      return redirect()->route('admin.dashboard')->with('warning','Payment cancel !!!');
    }

    public function submit_customer_data($tempStudent)
    {
      if($tempStudent->first_name == null){
        // dd('hi');
        $firstName = Student::where('user_id',$tempStudent->user_id)->get()->pluck('first_name')->first();
        $lastName = Student::where('user_id',$tempStudent->user_id)->get()->pluck('last_name')->first();

      }

      $firstName=$tempStudent->first_name;
      $lastName=$tempStudent->last_name;
      //dd($tempStudent);
        // $temSubject = TempStudent::where('user_id',$tempStudent->user_id)->latest()->pluck('batch_name')->first();
        $subject_id= preg_split("/[,]/",$tempStudent->batch_name);

        foreach ($subject_id as $key => $value) {
          $c[] = Subject::where('id',$value)->pluck('moodle_course_id')->first();
        }

        // $moodleId = TempStudent::where('user_id',$tempStudent->user_id)->get()->pluck('moodle_user_id')->first();
        $moodleId = $tempStudent->moodle_user_id;

        $course_id = $c;

        if(empty($moodleId)){
        $userId = $tempStudent->user_id;
        $domainName = MoodleData::get()->pluck('moodle_domain_name')->first();
        $createUser = MoodleData::get()->pluck('create_user')->first();
        $enrolUser = MoodleData::get()->pluck('enrol_user')->first();

        // $name = $tempStudent->name;
        $email = $tempStudent->email;
        $course_id = $course_id;
        $user_id = $userId;

        $result=array();
        // $parts = array_filter(explode(" ",$name));
        // if(count($parts) > 1) {
        //     $lastname = array_pop($parts);
        //     $firstname = implode(" ", $parts);
        // } else
        // {
        //     $lastname = $name;
        //     $firstname = ". ";
        // }

        // $firstname = str_replace(' ','',$firstname);
        // $lastname = $lastname;
        $firstname =  $firstName;
        $lastname = $lastName;
        $email = $email;
        $city = 'bangladesh';
        $country = 'BD';
        $description = 'Student added to Moodle';

        // $domainname = 'https://lms.debasishpk.com';
        // $wstoken = '2b289f5df011f9a37dc28d34890716c6'; //here paste your create user token
        $domainname = MoodleData::get()->pluck('moodle_domain_name')->first();
        $wstoken = $createUser; //here paste your create user token
        $wsfunctionname = 'core_user_create_users';
        $serverurl = $domainname . '/webservice/rest/server.php?wstoken=' . $wstoken . '&wsfunction=' . $wsfunctionname;

        $uniqueNumber = rand(0000,9999);
        // if($firstname ==" "){
        //     $userName = strtolower("$lastname$uniqueNumber");
        // }
        // else{
        //     $userName = strtolower("$firstname$uniqueNumber");
        // }

        $user1 = new \stdClass();

        $uName = str_replace(' ','',$firstName);
        $user1->username = strtolower("$uName$uniqueNumber");
        $user1->password = $tempStudent->password;
        $user1->firstname = $firstname;
        $user1->lastname = $lastname;
        $user1->email = $email;
        $user1->auth = 'manual';
        $user1->idnumber = 'numberID';
        $user1->lang = 'en';
        $user1->city = $city;
        $user1->country = $country;
        $user1->description = $description;

        $users = [$user1];

        $params = ['users' => $users];

        $response = Curl::to($serverurl)

                ->withData($params)

                ->post();
        // dd($response);
        //get id from $resp
        $xml_tree = new  \SimpleXMLElement($response);

        $jsonfile = json_encode($xml_tree);
        $myarray = json_decode($jsonfile,true);

        if(array_key_exists("ERRORCODE", $myarray)){
            echo "The key 'ERRORCODE' is exists in the cities array";
            }else{

            $value = $xml_tree->MULTIPLE->SINGLE->KEY->VALUE;
            $user_id = intval(sprintf('%s', $value));

            $id = TempStudent::where('user_id',$tempStudent->user_id)->latest()->pluck('id')->first();
            $tempStudent = TempStudent::find($id);
            $tempStudent->moodle_user_id =$user_id;
            $tempStudent->save();

            $id2 = TempStudent::where('id',$id)->get()->pluck('user_id');
            $id3 = TempStudent::where('id',$id)->where('user_id',$id2)->get()->pluck('moodle_user_id')->first();

            $id4 = Student::where('user_id',$id2)->get()->pluck('id')->first();

            $student = Student::find($id4);
            $student->moodle_user_id = $id3;
            $student->save();

            $course_ids = $course_id;

                foreach ($course_ids as $key => $course_id) {
                  if ($user_id) {

                      $this->enrol($user_id, $course_id);
                      // $this->toMail($user_id);
                  }

                  }
        }
      }else{

        $user_id = $moodleId;
        $course_ids = $course_id;

            foreach ($course_ids as $key => $course_id) {
              if ($user_id) {
                  $this->enrol($user_id, $course_id);
                  // $this->toMail($user_id);
                // echo $user_id." ".$course_id."<br>";
              }
          }
      }
    }

    //Set user enroll(role for permission)
    public function enrol($user_id, $course_id)
    {
        $role_id = 5; //assign role to be Student

        $domainname = MoodleData::get()->pluck('moodle_domain_name')->first();
        //paste your domain here
        $wstoken = MoodleData::get()->pluck('enrol_user')->first();
        //here paste your enrol token
        $wsfunctionname = 'enrol_manual_enrol_users';

        $serverurl = $domainname . '/webservice/rest/server.php?wstoken=' . $wstoken . '&wsfunction=' . $wsfunctionname;

        $enrolment = ['roleid' => $role_id, 'userid' => $user_id, 'courseid' => $course_id];
        $enrolments = [$enrolment];
        $params = ['enrolments' => $enrolments];

        $response = Curl::to($serverurl)
                ->withData($params)
                ->post();
        print_r($response);
    }

    public function toMail($user_id) {

      $user = Student::where('user_id',$user_id)->get()->pluck('user_id')->first();
      $user_name = User::where('id',$user_id)->get()->pluck('name')->first();
      $user_email = User::where('id',$user_id)->get()->pluck('email')->first();

      $data = array('name'=>$user);
      Mail::send('mail', compact('user'),
      function ($message) use ($user_email, $user_name){

          $message->from('info@theexamly.com',"theexamly.com");
          $message->to($user_email, $user_name)->subject('Congratulation! Your Login Details Here');
      });
    }

    //Random password generator method
    public function randomPassword() //according to Moodle password requirements
    {
        $part1 = '';
        $part2 = '';
        $part3 = '';

        //alphanumeric LOWER
        $alphabet = 'abcdefghijklmnopqrstuwxyz';
        $password_created = []; //remember to declare $pass as an array
        $alphabetLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 3; $i++) {
            $pos = rand(0, $alphabetLength); // rand(int $min , int $max)
            $password_created[] = $alphabet[$pos];
        }
        $part1 = implode($password_created); //turn the array into a string
        //echo"<br/>part1 = $part1";

        //alphanumeric UPPER
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUWXYZ';
        $password_created = []; //remember to declare $pass as an array
        $alphabetLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 3; $i++) {
            $pos = rand(0, $alphabetLength); // rand(int $min , int $max)
            $password_created[] = $alphabet[$pos];
        }
        $part2 = implode($password_created); //turn the array into a string
        //echo"<br/>part2 = $part2";

        //alphanumeric NUMBER
        $alphabet = '0123456789';
        $password_created = []; //remember to declare $pass as an array
        $alphabetLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 2; $i++) {
            $pos = rand(0, $alphabetLength); // rand(int $min , int $max)
            $password_created[] = $alphabet[$pos];
        }
        $part3 = implode($password_created); //turn the array into a string
        //echo"<br/>part3 = $part3";

        $password = $part1 . $part2 . $part3 . '#';
        return $password;
    }

    //Store temp student
    public function tempStore()
    {
       // dd($this->var);
       $student_count = Student::get()->count('id') + 1;
       $student_id = date('y') .$this->var->courseCategory.$this->var->course_name. str_pad($student_count, 4, '0', STR_PAD_LEFT);
       $first_name = TempStudent::where('user_id',$this->var->user_id)->pluck('first_name')->first();
       $last_name = TempStudent::where('user_id',$this->var->user_id)->pluck('last_name')->first();
       $phone = User::where('id',$this->var->user_id)->pluck('phone')->first();
       $email = User::where('id',$this->var->user_id)->pluck('email')->first();
       $password = User::where('id',$this->var->user_id)->pluck('raw_password')->first();
       $moodle_user_id = Student::where('user_id',$this->var->user_id)->pluck('moodle_user_id')->first();

       $temp = new TempStudent();
       $temp->user_id = $this->var->user_id;
       $temp->moodle_user_id = $moodle_user_id;
       $temp->student_id = $student_id;
       $temp->first_name = $first_name;
       $temp->last_name = $last_name;
       $temp->phone = $phone;
       $temp->email = $email;
       $temp->password = $password;
       $temp->courseCategory = $this->var->courseCategory;
       $temp->course_name = $this->var->course_name;
       $temp->batch_name = implode(",",$this->var->subject_id);
       $temp->course_fee = $this->var->course_fee;
       $temp->student_batch_id = $this->var->student_batch_id;
       $temp->coupon_code = $this->var->coupon_code;
       $temp->admission_date = date('d-m-Y');
       $temp->user_type = 'Student';
       $temp->user_role = '3';
       $temp->status = 'unpaid';
       // $user->created_by = Auth::user()->id;
       $temp->save();

       return redirect()->route('admin.dashboard')->with('success', ('Buing your Course Successfully done!'));

   }

    //sendsms for successful registration
    public function sendsms($number,$text){

        $DOMAIN = GenaralSettings::get()->pluck('sms_api_url')->first();
        $SID = GenaralSettings::get()->pluck('sid')->first();
        $API_TOKEN = GenaralSettings::get()->pluck('sms_username')->first();

        // $DOMAIN = "https://smsplus.sslwireless.com";
        // $SID = "Sid api";
        // $API_TOKEN = "DesktopIT-b5b257fb-2732-4905-99e9-54d0d206e9db";

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

    // bKash payment API.....

    public function token()
    {
        session_start();

        $request_token = $this->_bkash_Get_Token();
        // return $request_token;
        $idtoken = $request_token['id_token'];

        $_SESSION['token'] = $idtoken;

        /*$strJsonFileContents = file_get_contents("config.json");
        $array = json_decode($strJsonFileContents, true);*/

        $array = $this->_get_config_file();

        $array['token'] = $idtoken;

        $newJsonString = json_encode($array);
        File::put(storage_path() . '/app/public/config.json', $newJsonString);

        echo $idtoken;
    }

    protected function _bkash_Get_Token()
    {
        /*$strJsonFileContents = file_get_contents("config.json");
        $array = json_decode($strJsonFileContents, true);*/

        // $array = $this->_get_config_file();

        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => "https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/token/grant",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\"app_key\":\"5nej5keguopj928ekcj3dne8p\",\"app_secret\":\"1honf6u1c56mqcivtc9ffl960slp4v2756jle5925nbooa46ch62\"}",
          CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Content-Type: application/json",
            "password: test%#de23@msdao",
            "username: testdemo"
          ],
        ]);

        $response = curl_exec($curl);
        // $err = curl_error($curl);

        curl_close($curl);
        return json_decode($response,true);
    }

    protected function _get_config_file()
    {
        $path = storage_path() . "/app/public/config.json";
        return json_decode(file_get_contents($path), true);
    }

    public function createpayment()
    {

        session_start();

        /*$strJsonFileContents = file_get_contents("config.json");
        $array = json_decode($strJsonFileContents, true);*/

        $array = $this->_get_config_file();

        $amount = $_GET['amount'];
        $invoice = $_GET['invoice']; // must be unique
        $name = $_GET['name'];
        $intent = "sale";
        $email = $_GET['email'];
        $phone = $_GET['phone'];
        $exam_type = $_GET['exam_type'];
        $course_name = $_GET['course_name'];
        $subject_id = $_GET['subject_id'];
        $first_name = $_GET['first_name'];
        $last_name = $_GET['last_name'];
        $password = $_GET['password'];
        $proxy = $array["proxy"];
        $createpaybody = array('amount' => $amount, 'currency' => 'BDT', 'merchantInvoiceNumber' => $invoice, 'name' => $name, 'intent' => $intent, 'email' => $email, 'phone' => $phone,'exam_type' => $exam_type, 'course_name' => $course_name, 'subject_id' => $subject_id, 'first_name' => $first_name, 'last_name' => $last_name, 'password' => $password);

        $student_count = Student::get()->count('id') + 1;
        $student_id = date('y') .$exam_type.$course_name. str_pad($student_count, 4, '0', STR_PAD_LEFT);
        $tempStudent = new TempStudent();
        $tempStudent->student_id = $student_id;
        $tempStudent->first_name = $first_name;
        $tempStudent->last_name = $last_name;
        $tempStudent->phone = $phone;
        $tempStudent->email = $email;
        $tempStudent->password = $password;
        $tempStudent->courseCategory = $exam_type;
        $tempStudent->course_name = $course_name;
        $tempStudent->batch_name = $subject_id;
        $tempStudent->course_fee = $amount;
        $tempStudent->payment_amount = $amount;
        $tempStudent->user_type = 'Student';
        $tempStudent->user_role = '3';
        $tempStudent->admission_date = date('d-m-Y');
        $tempStudent->status = 'unpaid';
        $tempStudent->save();

        $createpaybodyx = new Bkash_order();
        $createpaybodyx->name = $createpaybody['name'];
        $createpaybodyx->invoice = $createpaybody['merchantInvoiceNumber'];
        $createpaybodyx->amount = $createpaybody['amount'];
        $createpaybodyx->email = $createpaybody['email'];
        $createpaybodyx->phone = $createpaybody['phone'];
        $createpaybodyx->exam_type = $createpaybody['exam_type'];
        $createpaybodyx->course_name = $createpaybody['course_name'];
        $createpaybodyx->subject_id = $createpaybody['subject_id'];
        $createpaybodyx->save();

        $url = curl_init($array["createURL"]);

        $createpaybodyx = json_encode($createpaybody);

        $header = array(
            'Content-Type:application/json',
            'authorization:' . $array["token"],
            'x-app-key:' . $array["app_key"]
        );

        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $createpaybodyx);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        //curl_setopt($url, CURLOPT_PROXY, $proxy);

        $resultdata = curl_exec($url);
        curl_close($url);
        // return $resultdata;

        echo $resultdata;
    }

    public function executepayment()
    {
        session_start();

        /*$strJsonFileContents = file_get_contents("config.json");
        $array = json_decode($strJsonFileContents, true);*/

        $array = $this->_get_config_file();

        $paymentID = $_GET['paymentID'];

        $proxy = $array["proxy"];

        $url = curl_init($array["executeURL"] . $paymentID);

        $header = array(
            'Content-Type:application/json',
            'authorization:' . $array["token"],
            'x-app-key:' . $array["app_key"]
        );

        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        // curl_setopt($url, CURLOPT_PROXY, $proxy);

        $resultdatax = curl_exec($url);
        curl_close($url);

        $this->_updateOrderStatus($resultdatax);

        echo $resultdatax;
    }

    protected function _updateOrderStatus($resultdatax)
    {
        $resultdatax = json_decode($resultdatax);

        if ($resultdatax && $resultdatax->paymentID != null && $resultdatax->transactionStatus == 'Completed') {
            DB::table('bkash_orders')->where([
                'invoice' => $resultdatax->merchantInvoiceNumber
            ])->update([

                 'paymentID' => $resultdatax->paymentID,
                 'trxID' => $resultdatax->trxID,
                 'transactionStatus' => $resultdatax->transactionStatus,
                 'currency' => $resultdatax->currency,
                 'intent' => $resultdatax->intent,
                 'merchantInvoiceNumber' => $resultdatax->merchantInvoiceNumber,
                 'createTime' => $resultdatax->createTime,
                 'updateTime' => $resultdatax->updateTime
            ]);

            //others tables execution
            $bkash_order_email = Bkash_order::where('invoice',$resultdatax->merchantInvoiceNumber)->latest()->pluck('email')->first();
            $bkash_order_exam_type = Bkash_order::where('invoice',$resultdatax->merchantInvoiceNumber)->latest()->pluck('exam_type')->first();
            $bkash_order_exam = Bkash_order::where('invoice',$resultdatax->merchantInvoiceNumber)->latest()->pluck('course_name')->first();

            $student_count = Student::get()->count('id') + 1;
            $student_id = date('y') .$bkash_order_exam_type.$bkash_order_exam. str_pad($student_count, 4, '0', STR_PAD_LEFT);

            $tempId = TempStudent::where('email',$bkash_order_email)->latest()->pluck('id')->first();

             $first_name = TempStudent::where('id',$tempId)->latest()->pluck('first_name')->first();
             $last_name = TempStudent::where('id',$tempId)->latest()->pluck('last_name')->first();

             $user = new User();
             $user->name = $first_name.' '.$last_name;
             $user->phone = TempStudent::where('id',$tempId)->latest()->pluck('phone')->first();
             $user->email = TempStudent::where('id',$tempId)->latest()->pluck('email')->first();
             $user->password = TempStudent::where('id',$tempId)->latest()->pluck('password')->first();
             $user->raw_password = TempStudent::where('id',$tempId)->latest()->pluck('password')->first();
             $user->student_id = $student_id;
             $user->user_type = 'Student';
             $user->save();

             $tempStudent = TempStudent::find($tempId);
             $tempStudent->user_id = $user->id;
             $tempStudent->status = 'paid';
             $tempStudent->save();

             $student = new Student();
             $student->user_id = $user->id;
             $student->first_name = $first_name;
             $student->last_name = $last_name;
             $student->student_id = $student_id;
             $student->save();

             $user_id = $user->id;

             $user->syncRoles([3]);
             $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();
             if (is_array($role_permissions) && count($role_permissions)) {
                 $user->syncPermissions($role_permissions);
             }

             // $subject_id = TempStudent::where('id',$tempId)->latest()->pluck('batch_name')->first();

             $temp = TempStudent::where('id',$tempId)->get()->pluck('batch_name')->first();

             $array= preg_split("/[,]/",$temp);

             $user->subjectUser()->attach($array);

             $paymentHistory = new PaymentHistory();
             $paymentHistory->user_id = $user_id;
             $paymentHistory->student_id = $student_id;
             $paymentHistory->batch_id = implode(',', $array);
             $paymentHistory->paymented_amount = TempStudent::where('id',$tempId)->latest()->pluck('course_fee')->first();
             //$paymentHistory->coupon_code = $tempStudent->coupon_code;
             $paymentHistory->payment_method = 'online';
             $paymentHistory->payment_date = date('d-m-Y');
             $paymentHistory->transaction_id = $resultdatax->trxID;
             $paymentHistory->save();


             // $this->submit_customer_data($tempStudent);
             // $this->toMail($user_id);

             return view ('frontend.pages.validation');
        }
    }

    public function emailValidation(){

        return view ('frontend.pages.validation')->with('success','Payment & Registration Success');
    }

}

