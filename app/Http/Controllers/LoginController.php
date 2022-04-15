<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        session_start();
        if ($request->session()->get('Name')) {
            return redirect('/');
        } else {
            return view('welcome');
        }
    }
    public function authenticate(Request $request)
    {
        $credential = $request->validate([
            'NIM' => 'required'
        ]);
        if ($request->session()->get('Name')) {
            $request->session()->flush();
        }
        $nim = $request->input('NIM');
        $attendee = DB::Table('msuser')->where('NIM', $nim)->first();
        if (!$attendee) {
            $message = 'Attendance failed, please check your NIM again, make sure it is correct';
            return redirect('/login')->with('message', $message);
        }
        $ListModule = DB::select("select * from msprivilege as mp JOIN msmodule AS mm ON mm.ModuleID = mp.ModuleID WHERE BinusianID = LEFT('" . $nim . "', 2)");
        $isadmin = DB::select("select * from msadmin as ms JOIN msbinusianid AS mbdi ON mbdi.BinusianID = ms.BinusianID WHERE NIM = '" . $nim  . "'");
        $request->session()->put('isAdmin', $isadmin);
        $request->session()->put('ListModule', $ListModule);
        $request->session()->put('Name', $attendee->Name);
        $request->session()->put('NIM', $attendee->NIM);
        return redirect('/login');
    }
    public function Logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}