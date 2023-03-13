<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class UserPagesController extends Controller
{
    public function index()
    {
        return view('UserPages.index');
    }

    public function faq()
    {
        return view('UserPages.faq');
    }

    public function termsAndPrivacy()
    {
        return view('UserPages.termsAndPrivacy');
    }

    public function contactUs()
    {
        return view('UserPages.contactUs');
    }

    public function contactUsStore(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'cf_name' => $request->name,
            'cf_email' => $request->email,
            'cf_phone' => $request->phone,
            'cf_subject' => $request->subject,
            'cf_message' => $request->message
        ];

        ContactForm::create($data);

        return redirect('contact-us')->with('message','Your message has successfully traversed the digital realm and arrived at our digital doorstep. We will promptly attend to your message with the utmost diligence and care. Thank you for your interest and support in our endeavors.')->with('messageType','success');
    }
}
