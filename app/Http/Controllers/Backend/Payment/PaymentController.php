<?php

namespace App\Http\Controllers\Backend\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Modules\Backend\Transaction;
use Ixudra\Curl\Facades\Curl;
use App\Models\Backend\Student;
use App\Models\Backend\Batch;
use App\Models\Backend\MoodleData;
use App\Models\Backend\GenaralSettings;
use App\User;
// use Modules\Admission\Entities\Paymentamount;
// use Modules\Admission\Entities\StudentDetails;
// use Modules\Admission\Entities\PaymentComplete;
// use Modules\Admission\Entities\TempStudent;

class PaymentController extends Controller
{
    public $var;

    public function paymentByStudent(Request $request)
    {
        dd($request);
        // $registration = Studentregistration::where('student_details_id', $student->id)->firstOrFail();
        
        // if(!TempStudent::findOrFail($student->id)){
        //     return redirect()->back('error', '100');
        // }
        // dd($student->paymentamounts_id);
        // $amounts = Paymentamount::findOrFail($student->paymentamounts_id);
        // dd($amounts);
        // $fee = $amounts->amount;
        // $charge = ceil(($fee*2.5)/100);
        $total = '10';
// dd($total);
        // dd($amounts);
        // exit;
        // return 'Pament By Student';
        // $user = User::where('id',$user_id)->with('userDetail')->with(['donation' => function ($query) {
        //     $query->where('status', 0);
        // }])->first();
    // return $user;
/*        $email = $user->email;
        $name = $user->name;
        $donatedAmount = $user->donation->sum('amount')dd($data);;
        $totalAmount = $user->reg_free+$donatedAmount;
        $phone_number   = $user->phone;
        if (strlen($phone_number) == 11 ) {
            $phone = '88'.$phone_number;
        }else{
            $phone = $phone_number;
        }
*/
        $post_data = array();
     // $post_data['store_id']    = "deskt5f854e115fecb"; //smmplas live
     // $post_data['store_passwd']  = "deskt5f854e115fecb@ssl"; // smmplsc live
        $post_data['store_id']    = "deskt5f854e115fecb";
       $post_data['store_passwd']  = "deskt5f854e115fecb@ssl";
        $post_data['total_amount']= 100;
        $post_data['currency']    = "BDT";
        // $post_data['tran_id']     = strtoupper(generateRandomString(2)).strtoupper(uniqid()).strtoupper(generateRandomString(1));
        // $post_data['tran_id'] = "E5DA9EFD68BAE5JX";
        $post_data['tran_id'] = chr(rand(65,90)) . rand(0,9) . chr(rand(65,90)) . chr(rand(65,90)) . rand(0,9) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . rand(0,9) . rand(0,9) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . rand(0,9) . chr(rand(65,90)) . chr(rand(65,90));
        // $post_data['success_url'] = route('payment.success',$user->id);
        // $post_data['fail_url']    = route('payment.fail',$user->id);
        // $post_data['cancel_url']  = route('payment.cancel',$user->id);
        $post_data['success_url'] = route("admin.payment.success");
        $post_data['fail_url']    = route("admin.payment.fail");
        $post_data['cancel_url']  = route("admin.payment.cancel");
    # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

    # EMI INFO
        $post_data['emi_option'] = "0";

    # CUSTOMER INFORMATION
        // $post_data['cus_name']  = $user->name;
        // $post_data['cus_email'] = isset($user->email) ? $user->email : 'admin@admin.com';
        // $post_data['cus_add1']  = isset($user->present_address) ? $user->present_address : '';
        // $post_data['cus_phone'] = $user->phone;
        $post_data['cus_name']  = 'Md. Ali';
        $post_data['cus_email'] = 'testing@test.com';
        $post_data['cus_add1']  = 'b';
        $post_data['cus_phone'] = '01711345678';

        $post_data['value_a'] = "1";
        $post_data['value_b'] = "";
        $post_data['value_c'] = "";
        $post_data['value_d'] = $post_data['tran_id'];

    # REQUEST SEND TO SSLCOMMERZ
     // $direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v4/api.php"; // smmplsc live
        $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url );
        curl_setopt($handle, CURLOPT_TIMEOUT, 50);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 50);
        curl_setopt($handle, CURLOPT_POST, 1 );
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle );
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        // dd($content);
        if($code == 200 && !( curl_errno($handle))) {
            curl_close( $handle);
            $sslcommerzResponse = $content;
            //var_dump($sslcommerzResponse); exit;
        } else {
            curl_close( $handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

    # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true );
// dd($sslcz);
        if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
    # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
    # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
            echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
    # header("Location: ". $sslcz['GatewayPageURL']);
            exit;
        } else {
            echo "JSON Data parsing error!";
        }

   
    }

    public function paymentSuccess(Request $request)
    {
        //echo "payment"; 
    //    $user = User::where('id',$user_id)->with('donation')->first();
    //    $order = Order::where('user_id',$user_id)->with(['orderDetails'=> function ($query) {
    //     $query->where('status', 0);
    // }])->latest()->first();
    // dd($order);
    // $order1 = $order->update([
    //  'status' => 1
    // ]);
    // dd($order1);
    // foreach ($order->orderDetails as $key => $value) {
    //        $value->update([
    //            'status' => 1
    //        ]);
    //    }
       /* $phone_number   = $user->phone;
        if (strlen($phone_number) == 11 ) {
            $phone = '88'.$phone_number;
        }else{
            $phone = $phone_number;
        }
        $email = $user->email;
        $name = $user->name;
        $user->update([
            'status' => 1
        ]);
        $donation = Donation::where('user_id',$user_id)->get();
        foreach ($donation as $key => $value) {
            $value->update([
                'status' => 1
            ]);
        }*/
        // return $request->all();
        // exit('001');
        //$transaction = Transaction::create($request->all());
        $dat = $request->all();
        // dd($data['tran_id'] ?? NULL);
        $transaction = Transaction::create([
           'tran_id' => $dat['tran_id'] ?? NULL,
           'val_id' => $dat['val_id'] ?? NULL,
           'amount' => $dat['amount'] ?? NULL,
           'card_type' => $dat['card_type'] ?? NULL,
           'store_amount' => $dat['store_amount'] ?? NULL,
           'card_no' => $dat['card_no'] ?? NULL,
           'bank_tran_id' => $dat['bank_tran_id'] ?? NULL,
           'status' => $dat['status'] ?? NULL,
           'tran_date' => $dat['tran_date'] ?? NULL,
           'currency' => $dat['currency'] ?? NULL,
           'card_issuer' => $dat['card_issuer'] ?? NULL,
           'card_brand' => $dat['card_brand'] ?? NULL,
           'card_issuer_country' => $dat['card_issuer_country'] ?? NULL,
           'card_issuer_country_code' => $dat['card_issuer_country_code'] ?? NULL,
           'store_id' => $dat['store_id'] ?? NULL,
           'verify_sign' => $dat['verify_sign'] ?? NULL,
           'verify_key' => $dat['verify_key'] ?? NULL,
           'cus_fax' => $dat['cus_fax'] ?? NULL,
           'verify_sign_sha2' => $dat['verify_sign_sha2'] ?? NULL,
           'currency_type' => $dat['currency_type'] ?? NULL,
           'currency_amount' => $dat['currency_amount'] ?? NULL,
           'currency_rate' => $dat['currency_rate'] ?? NULL,
           'base_fair' => $dat['base_fair'] ?? NULL,
           'value_a' => $dat['value_a'] ?? NULL,
           'value_b' => $dat['value_b'] ?? NULL,
           'value_c' => $dat['value_c'] ?? NULL,
           'value_d' => $dat['value_d'] ?? NULL,
           'risk_level' => $dat['risk_level'] ?? NULL,
           'risk_title' => $dat['risk_title'] ?? NULL,
           'error' => $dat['error'] ?? NULL,
           'key' => $dat['key'] ?? NULL,
           'pass' => $dat['pass'] ?? NULL,
       ]);
        // $registration = Studentregistration::where('student_details_id', $transaction->value_b)->firstOrFail();
        $classData = Paymentamount::findOrFail($transaction->value_b);
        $count = $classData->count;
        $count+=1;
        $class = sprintf("%02d", $classData->class);
        
        $student_id = '2020'. $class.sprintf("%03d", $count);

        $classData->update(['count'=>$count]);
        $class = $classData->name;
        
        $student = new StudentDetails();
        $student = TempStudent::findOrFail($transaction->value_a);
        // ----------------Start
        // $student['complete'] = 1;
        //dd($student);
        // $newData = array();
        // foreach ($student as $key => $value) {
        //     $key = $value[];
        // }
        // var_dump($student->toArray());
        // exit;
        // --------------End
        $newdata = $student->toArray();
        $newdata['transactions_id'] = $transaction->id;
        $newdata['complete'] = 1;
        $complete = StudentDetails::create($newdata);
        //dd($complete);
        $student->delete();

        $data['student_details_id'] = $complete->id;
        $data['paymentamounts_id'] = $classData->id;
        $data['transactions_id'] = $transaction->id;
        $data['complete'] = 1;
        $data['admission_id'] = $student_id;
        // $registration->update($data);
        PaymentComplete::create($data);


        $data = $complete;
        $email = "";
        $phone = "";
        $s_name = $student->name;
        if($student->PrimaryContact==3){
            $email = $student->localGurdian_email;
            $phone = $student->localGurdian_phone;
        }elseif($student->PrimaryContact==2){
            $email = $student->mother_email;
            $phone = $student->mother_phone;
        }elseif ($student->PrimaryContact==1) {
            $email = $student->father_email;
            $phone = $student->father_phone;
        }
        if ($email) {
        // $name = "My Name";
        // $email = "rokon.desktopit@gmail.com";
        $subject = "Registration Complete";
        $message = view('admission::admission.email.email', compact('class', 's_name', 'student_id'));

        $headers = 'From: admission@smmplsc.edu.bd'. "\r\n" .
        'Reply-To: admission@smmplsc.edu.bb'. "\r\n" .
        'Content-Type: text/html; charset=ISO-8859-1\r\n'.
        'X-Mailer: PHP/' . phpversion();
       // $mail = mail($email, $subject, $message, $headers);
        
        }
        if ($phone) {
        // $phone = '01515228613';
            $user = "SMMPLSC";
            $pass = "69G569v>";
            $sid = "SMMPLSCENG"; 
            $url="http://sms.sslwireless.com/pushapi/dynamic/server.php"; 
            $time = time();
            $param="user=$user&pass=$pass&sms[0][0]= $phone&sms[0][1]=".urlencode("Payment successfull for '".$s_name."', '".$class."', admission id is '".$student_id."'. transaction id ".$transaction->tran_id )."&sms[0][2]=$time&sid=$sid";
            $crl = curl_init(); curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE); 
            curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2); 
            curl_setopt($crl,CURLOPT_URL,$url); 
            curl_setopt($crl,CURLOPT_HEADER,0); 
            curl_setopt($crl,CURLOPT_RETURNTRANSFER,1); 
            curl_setopt($crl,CURLOPT_POST,1);
            curl_setopt($crl,CURLOPT_POSTFIELDS,$param);
            $response = curl_exec($crl); 
            curl_close($crl); 
        }

        // return redirect()->route('home')->with('success','Registration Process is completed and Sending for Approval');
        session()->put('success','Payment successfull.');
        // return view('admission::admission.home', compact('data'));
        return redirect()->route('admission.student.home', $data);
    }

    public function paymentFail(Request $request)
    {   
        // echo 'Fail'; exit;
        // return $request->all();
        // $transaction = Transaction::create($request->all());
                $data = $request->all();
        $transaction = Transaction::create([
	'tran_id' => $data['tran_id'] ?? NULL,
	'val_id' => $data['val_id'] ?? NULL,
	'amount' => $data['amount'] ?? NULL,
	'card_type' => $data['card_type'] ?? NULL,
	'store_amount' => $data['store_amount'] ?? NULL,
	'card_no' => $data['card_no'] ?? NULL,
	'bank_tran_id' => $data['bank_tran_id'] ?? NULL,
	'status' => $data['status'] ?? NULL,
	'tran_date' => $data['tran_date'] ?? NULL,
	'currency' => $data['currency'] ?? NULL,
	'card_issuer' => $data['card_issuer'] ?? NULL,
	'card_brand' => $data['card_brand'] ?? NULL,
	'card_issuer_country' => $data['card_issuer_country'] ?? NULL,
	'card_issuer_country_code' => $data['card_issuer_country_code'] ?? NULL,
	'store_id' => $data['store_id'] ?? NULL,
	'verify_sign' => $data['verify_sign'] ?? NULL,
	'verify_key' => $data['verify_key'] ?? NULL,
	'cus_fax' => $data['cus_fax'] ?? NULL,
	'verify_sign_sha2' => $data['verify_sign_sha2'] ?? NULL,
	'currency_type' => $data['currency_type'] ?? NULL,
	'currency_amount' => $data['currency_amount'] ?? NULL,
	'currency_rate' => $data['currency_rate'] ?? NULL,
	'base_fair' => $data['base_fair'] ?? NULL,
	'value_a' => $data['value_a'] ?? NULL,
	'value_b' => $data['value_b'] ?? NULL,
	'value_c' => $data['value_c'] ?? NULL,
	'value_d' => $data['value_d'] ?? NULL,
	'risk_level' => $data['risk_level'] ?? NULL,
	'risk_title' => $data['risk_title'] ?? NULL,
	'error' => $data['error'] ?? NULL,
	'key' => $data['key'] ?? NULL,
	'pass' => $data['pass'] ?? NULL,
]);
        // $registration = Studentregistration::where('student_details_id', $transaction->value_b)->firstOrFail();
        $data['student_details_id'] = $transaction->value_a;
        $data['paymentamounts_id'] = $transaction->value_b;
        $data['transactions_id'] = $transaction->id;
        // $registration->update($data);
        // PaymentComplete::create($data);
        session()->put('danger','Payment Failed.');
        return redirect()->route('frontend.admission.selection', $transaction->value_a);
    }


    public function paymentCancel(Request $request)
    {   
        // echo 'Cancel'; exit;
        // $transaction = Transaction::create($request->all());
                $data = $request->all();
                
        $transaction = Transaction::create([
	'tran_id' => $data['tran_id'] ?? NULL,
	'val_id' => $data['val_id'] ?? NULL,
	'amount' => $data['amount'] ?? NULL,
	'card_type' => $data['card_type'] ?? NULL,
	'store_amount' => $data['store_amount'] ?? NULL,
	'card_no' => $data['card_no'] ?? NULL,
	'bank_tran_id' => $data['bank_tran_id'] ?? NULL,
	'status' => $data['status'] ?? NULL,
	'tran_date' => $data['tran_date'] ?? NULL,
	'currency' => $data['currency'] ?? NULL,
	'card_issuer' => $data['card_issuer'] ?? NULL,
	'card_brand' => $data['card_brand'] ?? NULL,
	'card_issuer_country' => $data['card_issuer_country'] ?? NULL,
	'card_issuer_country_code' => $data['card_issuer_country_code'] ?? NULL,
	'store_id' => $data['store_id'] ?? NULL,
	'verify_sign' => $data['verify_sign'] ?? NULL,
	'verify_key' => $data['verify_key'] ?? NULL,
	'cus_fax' => $data['cus_fax'] ?? NULL,
	'verify_sign_sha2' => $data['verify_sign_sha2'] ?? NULL,
	'currency_type' => $data['currency_type'] ?? NULL,
	'currency_amount' => $data['currency_amount'] ?? NULL,
	'currency_rate' => $data['currency_rate'] ?? NULL,
	'base_fair' => $data['base_fair'] ?? NULL,
	'value_a' => $data['value_a'] ?? NULL,
	'value_b' => $data['value_b'] ?? NULL,
	'value_c' => $data['value_c'] ?? NULL,
	'value_d' => $data['value_d'] ?? NULL,
	'risk_level' => $data['risk_level'] ?? NULL,
	'risk_title' => $data['risk_title'] ?? NULL,
	'error' => $data['error'] ?? NULL,
	'key' => $data['key'] ?? NULL,
	'pass' => $data['pass'] ?? NULL,
]
);

        // $registration = Studentregistration::where('student_details_id', $transaction->value_b)->firstOrFail();
        $data['student_details_id'] = $transaction->value_a;
        $data['paymentamounts_id'] = $transaction->value_b;
        $data['transactions_id'] = $transaction->id;
        // $registration->update($data);
        // PaymentComplete::create($data);
        session()->put('warning','Payment Cancel.');

        return redirect()->route('frontend.admission.selection', $transaction->value_a);
        // return redirect()->route('home')->with('warning','Registration Canceled');
    }
    public function paymentIPN(Request $request)
    {
        dd($request->all());
    }

    
    public function emailStatus()
    {
        return view('admission::admission.email.email');
    }

    public function submit_customer_data(Request $request)
    {
        dd($request);
        $domainName = MoodleData::get()->pluck('moodle_domain_name')->first();
        $createUser = MoodleData::get()->pluck('create_user')->first();
        $enrolUser = MoodleData::get()->pluck('enrol_user')->first();
        $name = Student::with('User')->get()->pluck('user.name')->first();
        dd($enrolUser);
        $email = User::get()->pluck('email')->first();
        $course_id = Batch::get()->pluck('moodle_course_id')->first();
        $user_id = Student::get()->pluck('moodle_user_id')->first();
        
        $firstname = 'TestUser';
        $lastname = 'TestUser';
        $email = 'saba@zzz.gr';
        $city = 'bangladesh';
        $country = 'Bangladesh';
        $description = 'Student added to Moodle';

        // $domainname = 'https://lms.debasishpk.com';
        // $wstoken = '2b289f5df011f9a37dc28d34890716c6'; //here paste your create user token
        $domainname = $domainName;
        $wstoken = $createUser; //here paste your create user token
        $wsfunctionname = 'core_user_create_users';
        $serverurl = $domainname . '/webservice/rest/server.php?wstoken=' . $wstoken . '&wsfunction=' . $wsfunctionname;

        $user1 = new \stdClass();

        $user1->username = 'omarkahn';
        $user1->password = 'ypdNOA04#';
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

        //get id from $resp
        $xml_tree = new  \SimpleXMLElement($response);
        print_r($xml_tree);

        $value = $xml_tree->MULTIPLE->SINGLE->KEY->VALUE;
        $user_id = intval(sprintf('%s', $value));
        $course_id = 3;
        if ($user_id) {
            $this->enrol($user_id, $course_id);
        }
    }

    public function enrol($user_id, $course_id)
    {
        $role_id = 3; //assign role to be Student

        // $domainname = 'https://lms.debasishpk.com'; //paste your domain here
        // $wstoken = '3852dbebb334bd13f84048d5e3e393ee'; //here paste your enrol token
        $domainname = $domainName; //paste your domain here
        $wstoken = $enrolUser; //here paste your enrol token
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
}

