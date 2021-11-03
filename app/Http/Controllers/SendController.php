<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class SendController extends Controller
{
    public function send(Request $request){
    	try{
	        $data = [
	          'subject' => $request->subject,
	          'email' => $request->email,
	          'content' => $request->message
	        ];

	        Mail::send('email-template', $data, function($message) use ($data) {
	          $message->to('support@mira.id')
	          ->subject('From '.$data['email'].' "'. $data['subject']. '"');
	        });
			return redirect()->back();
	    }
	    catch (Exception $e){
	        return response (['status' => false,'errors' => $e->getMessage()]);
	    }
    }
}
