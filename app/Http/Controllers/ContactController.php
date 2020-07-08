<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\contact; 
use App\User;

class ContactController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('contact');
    }


    public function sendEmail(Request $request)
    {
        // $users = User::create([
        //     $name = $request->name,
        //     $email = $request->email,
        //     $subject = $request->subject,
        //     $message = $request->message,
        //     ]);

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        if(Mail::to("agiwely92@gmail.com")->send( new contact( $name , $email , $subject , $message )))
        {
            // return redirect('/contact')->withStatus('Something Wrong , Try Again Later !!');
                        return response()->json(['message' => 'Something Wrong , Try Again Later !!']);

        }else{
            // return redirect('/contact')->withStatus('Your Email Has been sent  successfully');
                        return response()->json(['message' => 'Your Email Has been sent  successfully']);
        }


        // $user =Auth::user()->name;
        // $data = [
        //     'name'    =>$user,
        //     'email'   =>$request->email,
        //     'subject' => $request->subject,
        //     'message'     => $request->message,
        // ];

        // Mail::send('mails.contact',$data, function($message){
        //     $message->to('agiwely92@gmail.com')->subject('User Contact');
        // });
    }

}
