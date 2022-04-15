<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session_start();
        if ($request->session()->get('NIM')) {
            $isadmin = DB::select("select * from msadmin as ms JOIN msbinusianid AS mbdi ON mbdi.BinusianID = ms.BinusianID WHERE NIM = '" . $request->session()->get('NIM') . "'");
            if ($isadmin == null) {
                return redirect('/');
            } else {
                // dd($isadmin);
                return view('adminlogin', ['BinusianList' => $isadmin]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function authenticateadmin(Request $request)
    {
        $hashedPassword = Hash::make($request->Password);
        if (Hash::check($request->Password,  DB::Table('msadminpassword')->where('BinusianID', $request->BinusianID)->first()->PasswordAdmin)) {
            $request->session()->put('BinusianID', $request->BinusianID);
            $major = DB::select("select * from ltmajor");
            $Course = DB::select("select * from ltcourse");
            $Smt = DB::select("select * from ltsmt");
            $Binusian = DB::Table('msbinusianid')->where('BinusianID', $request->BinusianID)->first();
            return view('admin', ['Major' => $major, 'Course' => $Course, 'smt' => $Smt, 'Binusian' => $Binusian]);
        } else {
            return redirect('/admin');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UploadData(Request $request)
    {
        $Validate = $request->validate([
            'UploadFile' => ['required', 'max:200000']
        ]);
        if ($request->session()->get('NIM')) {
            $isadmin = DB::select("select * from msadmin as ms JOIN msbinusianid AS mbdi ON mbdi.BinusianID = ms.BinusianID WHERE NIM = '" . $request->session()->get('NIM') . "'");
            if ($isadmin == null) {
                return redirect('/');
            } else {
                session_start();
                if ($request->hasFile('UploadFile')) {
                    $filenameWithExt = $request->file('UploadFile')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('UploadFile')->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    $path = $request->file('UploadFile')->storeAs('public/files', $fileNameToStore);

                    DB::insert("INSERT INTO ltcourse (CourseName, CourseDescription, FileName) VALUES('" . $request->Course . "', '" . $request->Description . "', '" . $path . "')");
                    $BinusianID = $request->session()->get('BinusianID');
                    $CourseData = DB::Table('ltcourse')->where('FileName', $path)->first();
                    for ($i = 0; $i <= $request->NumberRow; $i++) {
                        $MajorName = 'Major_' . $i;
                        $SmtName = 'Semester_' . $i;
                        DB::insert("INSERT INTO msmajorcourse VALUES('" . $BinusianID . "', '" . $request[$MajorName] . "','" . $CourseData->CourseID . "', '" . $request[$SmtName] . "', '" . $request->session()->get('NIM') . "', CURRENT_TIME)");
                    }
                }
                return redirect('/admin');
            }
        } else {
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}