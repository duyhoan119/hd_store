<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendForgotPassEmail(){
        $toEmail = 'duyhoank@gmail.com';
        $mailMessage = 'asdasdsadadansdsandjksanddnjksan a22e2efed32d3232   d';
        $subject = 'for got password';
       $response = Mail::to($toEmail)->send(new SendEmail($mailMessage,$subject)); 
       dd($response);
    } 

}
