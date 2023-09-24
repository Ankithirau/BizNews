<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller as BaseController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends BaseController 
{
    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function index()
    {
        return view('admin.auth.login');
    }
}
