<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;

use function PHPSTORM_META\type;

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
                return redirect('/')->with('LoginError', 'Admin Account Invalid!');
            } else {
                $request->session()->put('activemenu', 'Admin');
                if ($request->session()->get('IsAdmin') == "True") {
                    $Datas = DB::select("SELECT DISTINCT mjc.CourseID, CourseName, CourseDescription, CourseImage FROM msmajorcourse AS mjc JOIN ltcourse as lc ON lc.CourseID = mjc.CourseID WHERE mjc.BinusianID = " . $request->session()->get('BinusianID'));
                    $Binusian = DB::Table('msbinusianid')->where('BinusianID', $request->session()->get('BinusianID'))->first();
                    return view('admin', ['Datas' => $Datas, 'Binusian' => $Binusian]);
                }

                return view('adminlogin', ['BinusianList' => $isadmin]);
            }
        } else {
            return redirect('/login')->with('LoginError', 'Session Expired!');
        }
    }

    public function authenticateadmin(Request $request)
    {

        $hashedPassword = Hash::make($request->Password);
        if (Hash::check($request->Password,  DB::Table('msadminpassword')->where('BinusianID', $request->BinusianID)->first()->PasswordAdmin)) {
            $request->session()->put('BinusianID', $request->BinusianID);
            $request->session()->put('IsAdmin', 'True');
            $Datas = DB::select("SELECT DISTINCT mjc.CourseID, CourseName, CourseDescription, CourseImage FROM msmajorcourse AS mjc JOIN ltcourse as lc ON lc.CourseID = mjc.CourseID WHERE mjc.BinusianID = " . $request->BinusianID);
            $Binusian = DB::Table('msbinusianid')->where('BinusianID', $request->BinusianID)->first();
            return view('admin', ['Datas' => $Datas, 'Binusian' => $Binusian]);
        } else {
            return back()->with('LoginError', 'Password Invalid!');
        }
    }
    public function authenticateadmintemp(Request $request)
    {
        $hashedPassword = Hash::make($request->Password);
        if (Hash::check($request->Password,  DB::Table('msadminpassword')->where('BinusianID', $request->BinusianID)->first()->PasswordAdmin)) {
            $request->session()->put('BinusianID', $request->BinusianID);
            $major = DB::select("select * from ltmajor");
            $Smt = DB::select("select * from ltsmt");
            $Binusian = DB::Table('msbinusianid')->where('BinusianID', $request->BinusianID)->first();
            return view('admin', ['Major' => $major, 'smt' => $Smt, 'Binusian' => $Binusian]);
        } else {
            return back()->with('LoginError', 'Password Invalid!');
        }
    }
    public function addeditadmin(Request $request, $Course, $type)
    {
        if ($request->session()->get('IsAdmin') == "True") {
            if ($type == 'edit') {
                $major = DB::select("select * from ltmajor");
                $Smt = DB::select("select * from ltsmt");
                $CourseInformation = DB::Table('ltcourse')->where('CourseID', $Course)->first();
                $Datas = DB::select("SELECT * FROM msmajorcourse AS MMC JOIN ltmajor AS LM ON LM.MajorID = MMC.MajorID JOIN ltcourse AS LC ON LC.CourseID = MMC.CourseID WHERE BinusianID =" . $request->session()->get('BinusianID') . " AND MMC.CourseID = " . $Course);
                $Binusian = DB::Table('msbinusianid')->where('BinusianID', $request->session()->get('BinusianID'))->first();
                return view('addeditcourse', ['Major' => $major, 'smt' => $Smt, 'Datas' => $Datas, 'Binusian' => $Binusian, 'Course' => $CourseInformation, 'Type' => 'edit']);
            } else if ($type == 'add') {
                $major = DB::select("select * from ltmajor");
                $Smt = DB::select("select * from ltsmt");
                $Binusian = DB::Table('msbinusianid')->where('BinusianID', $request->session()->get('BinusianID'))->first();
                return view('addeditcourse', ['Major' => $major, 'smt' => $Smt, 'Binusian' => $Binusian, 'Type' => 'add']);
            } else if ($type == "delete") {
                DB::delete('delete from msmajorcourse where CourseID = ' . $Course);
                DB::delete('delete from ltcourse where CourseID = ' . $Course);
                return redirect('/admin');
            } else {
                return redirect('/admin');
            }
        } else {
            return redirect('/');
        }
    }
    public function Logout()
    {
        session()->forget('BinusianID');
        session()->forget('IsAdmin');
        return redirect('/admin');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UploadData(Request $request, $Course, $Type)
    {

        if ($request->session()->get('NIM')) {

            $isadmin = DB::select("select * from msadmin as ms JOIN msbinusianid AS mbdi ON mbdi.BinusianID = ms.BinusianID WHERE NIM = '" . $request->session()->get('NIM') . "'");
            if ($isadmin == null) {
                return redirect('/');
            } else {
                if ($Type == "add") {
                    $request->validate([
                        'UploadFile' => ['required', 'max:200000']
                    ]);
                    session_start();
                    if ($request->hasFile('UploadFile')) {
                        $filenameWithExt = $request->file('UploadFile')->getClientOriginalName();
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension = $request->file('UploadFile')->getClientOriginalExtension();
                        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                        $path = $request->file('UploadFile')->storeAs('public/files', $fileNameToStore);

                        DB::insert("INSERT INTO ltcourse (CourseName, CourseDescription, CourseImage, FileName) VALUES('" . $request->Course . "', '" . $request->Description . "', '" . $request->Image . "','" . $path . "')");
                        $BinusianID = $request->session()->get('BinusianID');
                        $CourseData = DB::Table('ltcourse')->where('FileName', $path)->first();
                        for ($i = 0; $i <= $request->NumberRow; $i++) {
                            $MajorName = 'Major_' . $i;
                            $SmtName = 'Semester_' . $i;
                            $CheckCourse = DB::Table('msmajorcourse')->where('BinusianID', $request->BinusianID)->where('MajorID', $request[$MajorName])->where('CourseID', $CourseData->CourseID)->where('SmtID', $request[$SmtName])->first();
                            if ($CheckCourse == null) {
                                DB::insert("INSERT INTO msmajorcourse( MajorID, CourseID, SmtID, BinusianID, AuditUserName, AuditTime) VALUES('" . $request[$MajorName] . "', '" . $CourseData->CourseID . "','" . $request[$SmtName] . "', '" . $BinusianID . "', '" . $request->session()->get('NIM') . "', CURRENT_TIME)");
                            }
                        }
                        return redirect('/');
                    } else {
                        return back();
                    }
                } else if ($Type == "edit") {
                    if ($request->File == "Add") {
                        $Validate = $request->validate([
                            'UploadFile' => ['required', 'max:200000']
                        ]);

                        session_start();
                        if ($Validate) {
                            if ($request->hasFile('UploadFile')) {
                                $filenameWithExt = $request->file('UploadFile')->getClientOriginalName();
                                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                                $extension = $request->file('UploadFile')->getClientOriginalExtension();
                                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                                $path = $request->file('UploadFile')->storeAs('public/files', $fileNameToStore);
                                DB::update("UPDATE ltcourse SET CourseName = '" . $request->Course . "', CourseDescription = '" . $request->Description . "',CourseImage ='" . $request->Image . "', FileName = '" . $path . "' WHERE CourseID = " . $Course);
                            }
                        }
                    } else {
                        DB::update("UPDATE ltcourse SET CourseName = '" . $request->Course . "', CourseDescription = '" . $request->Description . "',CourseImage ='" . $request->Image . "' WHERE CourseID = " . $Course);
                    }
                    $BinusianID = $request->session()->get('BinusianID');
                    for ($i = 0; $i <= $request->NumberRow; $i++) {
                        $MajorName = 'Major_' . $i;
                        $SmtName = 'Semester_' . $i;
                        $CheckCourse = DB::Table('msmajorcourse')->where('BinusianID', $BinusianID)->where('MajorID', $request[$MajorName])->where('CourseID', $Course)->first();


                        if ($CheckCourse == null) {
                            DB::insert("INSERT INTO msmajorcourse (MajorID, CourseID, SmtID, BinusianID, AuditUserName, AuditTime) VALUES('" . $request[$MajorName] . "', '" . $Course . "','" . $request[$SmtName] . "', '" . $BinusianID . "', '" . $request->session()->get('NIM') . "', CURRENT_TIME)");
                        } else {
                            DB::update("UPDATE msmajorcourse SET SmtID ='" . $request[$SmtName] . "',AuditUserName ='" . $request->session()->get('NIM') . "',AuditTime =CURRENT_TIME WHERE MajorID = '" . $request[$MajorName] . "' AND CourseID = '" . $Course . "' AND BinusianID = " . $BinusianID);
                        }
                    }
                    return redirect('/admin');
                } else {
                    return redirect('/');
                }
            }
        } else {
            return redirect('/login');
        }
    }
    public function authSoftware(Request $request){
        if(!$request->session()->get('IsAdmin')){
            return redirect('/admin');
        }else{
            return view('adminsoftware');
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