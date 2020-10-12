<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function login(Request $request)
    {
        return view('/dashboard/login');
    }
    public function signup(Request $request)
    {
        return view('dashboard/signup');
    }
    public function create_new_company(Request $request)
    {
    }
}
