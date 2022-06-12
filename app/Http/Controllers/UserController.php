<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        session_start();
        if ($request->session()->get('Name')) {
            $request->session()->put('activemenu', 'Course');
            $MajorList = DB::select("select * from ltmajor");
            $SmtList = DB::select("select * from ltsmt");
            $MajorCourseList = DB::select("SELECT mjc.CourseID, CourseName, CourseDescription, CourseImage, SmtID FROM msmajorcourse AS mjc JOIN ltcourse as lc ON lc.CourseID = mjc.CourseID WHERE MajorID = " . $MajorList[0]->MajorID);

            return view('index', ['MajorList' => $MajorList, 'SmtList' => $SmtList, 'MajorCourseList' => $MajorCourseList]);
        } else {
            return redirect('/login');
        }
    }

    public function changeMajor(Request $request)
    {
        session_start();
        if ($request->session()->get('Name')) {
            $request->validate([
                'major' => 'required'
            ]);
            $Major = $request->major;

            $request->session()->put('activemenu', 'Course');
            $MajorList = DB::select("select * from ltmajor");
            $SmtList = DB::select("select * from ltsmt");
            $MajorCourseList = DB::select("SELECT mjc.CourseID, CourseName, CourseDescription, CourseImage FROM msmajorcourse AS mjc JOIN ltcourse as lc ON lc.CourseID = mjc.CourseID WHERE MajorID = " . $Major);

            return view('index', ['MajorList' => $MajorList, 'SmtList' => $SmtList, 'MajorCourseList' => $MajorCourseList]);
        } else {
            return redirect('/login');
        }
    }

    public function software(Request $request)
    {
        session_start();
        if ($request->session()->get('Name')) {
            $request->session()->put('activemenu', 'Software');
            return view('software');
        } else {
            return redirect('/login');
        }
    }
}