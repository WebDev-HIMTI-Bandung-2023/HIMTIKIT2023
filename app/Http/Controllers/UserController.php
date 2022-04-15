<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        session_start();
        // dd($request->session()->get('isAdmin'));
        if ($request->session()->get('Name')) {
            $request->session()->put('activemenu', 'Course');
            return view('index');
        } else {
            return redirect('/login');
        }
    }
}