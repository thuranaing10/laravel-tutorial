<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
//use Mail;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function index(){
    	return view('sendemail');
    }
    public function send(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'required|email',
    		'message'=>'required'
    	]);

    	$data = array(
    		'name'	=>	$request->name,
    		'message'=> $request->message
    	);
      //var_dump($data);
    	Mail::to('thurarocm77@gmail.com')->send(new SendEmail($data));
    	return back()->with('success','Thanks for contacting us!');
     }

   //  public function basic_email() {
   //    $data = array('name'=>"Virat Gandhi");
   
   //    Mail::send(['text'=>'mail'], $data, function($message) {
   //       $message->to('thuranaingrocm77@gmail.com', 'Tutorials Point')->subject
   //          ('Laravel Basic Testing Mail');
   //       $message->from('thurarocm77@gmail.com','Virat Gandhi');
   //    });
   //    echo "Basic Email Sent. Check your inbox.";
   // }

   // public function mail(){
   //      $data = array("name"=>"Sam","body"=>"Test mail");
   //      Mail::send(['text'=>'mail'],$data,function($message){
   //          $message->to('thuranaingrocm77@gmail.com','Artisans')->subject('Artisan web Training Mail');
   //          $message->from('thura@gmail.com',"Salah");
   //      });
   //      echo "Email check";
   //  }
   public function aa(){
    $data = [
            'title'=>'New Lessions from BM',
            'content'=>'This is the ice cool,Micheal for the white goat!',
        ];
        Mail::send('email.mail',$data,function ($message){
            $subject = "I am testing my emil.";
            $email = "thuranaingrocm77@gmail.com";
            $username = "thuranaing";
            $message->to($email,$username)->subject($subject);

        });
   }
}
