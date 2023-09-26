<?php

namespace App\Http\Controllers\frontend;

use App\Mail\ContactMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $request->except('token','method');

        $requestdata = $request->validate([
            'name' => ['required', 'string', 'max:40'],
            'email' => ['required', 'email', 'unique:contact_us'],
            'subject' => ['required', 'string', 'max:100'],
            'message' => ['required', 'string', 'max:250'],
        ]);

        try {
            $data=ContactUs::create($requestdata);

            Mail::to($requestdata['email'])->send(new ContactMail($requestdata));

            $status='success';

            $message='Thank you for your message! We will get back to you soon.';
            
        } catch (\Throwable $th) {

            $status='error';

            $message='Something went wrong! Please try again'.$th->getMessage();
        }

        return redirect()->route('contact.index')->with($status,$message);
    }
}
