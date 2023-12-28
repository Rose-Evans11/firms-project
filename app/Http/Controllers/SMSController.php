<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
class SMSController extends Controller
{
    public function sendsms(){
        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_TOKEN");
        $senderNumber = getenv("TWILIO_PHONE");
        $twilio = new Client($sid, $token);
        
        $message = $twilio->messages
                          ->create("+639275854911", // to
                                   [
                                       "body" => "You just file an insurance report. We will validate it, kindly, wait our message for other information. Thank you!",
                                       "from" => $senderNumber
                                   ]
                          );
        
        print($message->sid);
    }
}
