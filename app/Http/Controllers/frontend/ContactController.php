<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $request->except('token','method');

        try {
            $requestdata = $request->validate([
                'name' => ['required', 'string', 'max:40'],
                'email' => ['required', 'email', 'unique:contact_us'],
                'subject' => ['required', 'string', 'max:100'],
                'message' => ['required', 'string', 'max:250'],
            ]);

            $data=ContactUs::create($requestdata);

            $status='success';

            $message='Thank you for your message! We will get back to you soon.';
            
        } catch (\Throwable $th) {

            $status='error';

            $message='Something went wrong! Please try again';
        }

        return redirect()->route('contact.index')->with($status,$message);
    }
}
