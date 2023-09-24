<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function enquiry()
    {
        return view('admin.enquiry',[
            'enquiry'=>ContactUs::orderBy('id','desc')->get(),
            'is_page'=>'enquiry'
        ]);
    }
}
