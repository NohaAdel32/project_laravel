<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use App\Models\Contact;
use Mail;

class ExampleController extends Controller
{
   public function show(){
    return "My first controller";
        }
        public function upload(Request $request){
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'assets/images';
            $request->image->move($path, $file_name);
            return 'Uploaded';
}
public function createsession(){
    session()->put('testSession', 'My First session value');
    return 'session created'. session('testSession');
}
public function contact_mail_send(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'email'=> 'required|string',
            'phone' => 'required|string',
            'subject' => 'required',
            'message' => 'required',
            ]);
            Contact::create($data);
        Mail::to( 'noha@gmail.com')->send( 
            new ContactEmail($data)
        );
        return redirect('contact')->with('success', 'Send Email');
    }
}