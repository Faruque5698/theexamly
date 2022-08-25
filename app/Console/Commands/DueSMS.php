<?php

namespace App\Console\Commands;

use App\Models\Backend\BatchStudent;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Http\Controllers\Backend\Notification\NotificationController;

class DueSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:due';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Due SMS to students/subscribers prior to 3 days of their due payment date via sms.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $notification_controller = new NotificationController();
        $notification_controller->duesms();
        
        // $current = Carbon::today();
        // $trialExpires = Carbon::today()->addDays(3);
        // $dueAlerts = BatchStudent::with(['User','batch'])->where('due_amount','>',0)->whereBetween('commitment_date', [$current, $trialExpires])->latest()->get();
        // if($dueAlerts->isNotEmpty()){
        //     foreach ($dueAlerts as $dueAlert) {
        //         //for send sms
        //         $number = $dueAlert->user->phone;
        //         $text = 'Friendly reminder '.$dueAlert->user->name.' your payment is due on '.$dueAlert->commitment_date;
        //         $response=$this->sendsms($number,$text);
        //     }
        //     $this->info('Successfully sent due alert to everyone intended.');
        // }
    }

    // public function sendsms($number,$text){       
      
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
}
