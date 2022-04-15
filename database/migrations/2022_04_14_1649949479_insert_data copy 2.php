<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('ltsmt')->insert(['SmtID' => 1,  'SmtName' => 'Semester 1']);
        DB::table('ltsmt')->insert(['SmtID' => 2,  'SmtName' => 'Semester 2']);
        DB::table('ltsmt')->insert(['SmtID' => 3,  'SmtName' => 'Semester 3']);
        DB::table('ltsmt')->insert(['SmtID' => 4,  'SmtName' => 'Semester 4']);

        DB::table('msbinusianid')->insert(['BinusianID' => 24,  'BinusianName' => 'Binusian 24']);

        DB::table('ltrole')->insert(['RoleName' => 'Admin']);

        DB::table('ltmajor')->insert(['MajorName' => 'Computer Science']);
        DB::table('ltmajor')->insert(['MajorName' => 'Mobile Application and Technology']);
        DB::table('ltmajor')->insert(['MajorName' => 'Game Application and Technology']);
        DB::table('ltmajor')->insert(['MajorName' => 'Data Science']);
        DB::table('ltmajor')->insert(['MajorName' => 'Cyber Security']);
        DB::table('ltmajor')->insert(['MajorName' => 'Computer Science & Mathematics']);
        DB::table('ltmajor')->insert(['MajorName' => 'Computer Science & Statistics']);

        DB::table('msuser')->insert(['NIM' => '0000000000', 'Name' => 'UserAdmin']);
        DB::table('msuser')->insert(['NIM' => '0000000001', 'Name' => 'User']);

        DB::table('msadmin')->insert(['NIM' => '0000000000', 'RoleID' => '1', 'BinusianID' => '24']);

        // Testing
        DB::table('msadminpassword')->insert(['BinusianID' => '24', 'PasswordAdmin' => '$2y$10$A67m/I5sdq.bvxg8oeRd3eT7s0Hz4Cr9r8x9Fgs1pcU1rbaAL9nua']);

        DB::table('msmodule')->insert(['ModuleName' => 'Course', 'ModuleLink' => '/']);
        DB::table('msmodule')->insert(['ModuleName' => 'Admin', 'ModuleLink' => '/admin']);

        DB::table('msprivilege')->insert(['ModuleID' => '1', 'BinusianID' => '24']);
        // DB::table('ltcourse')->insert(['CourseName' => 'Math Discrete', 'CourseDescription' => 'Math Discrete', 'FileName' => '']);
        // DB::table('ltcourse')->insert(['CourseName' => 'Linear Algebra', 'CourseDescription' => 'Linear Algebra', 'FileName' => '']);
        // DB::table('ltcourse')->insert(['CourseName' => 'Computer Security Fundamental', 'CourseDescription' => 'Computer Security Fundamental', 'FileName' => '']);
        // DB::table('ltcourse')->insert(['CourseName' => 'Game Design', 'CourseDescription' => 'Game Design', 'FileName' => '']);
        // DB::table('ltcourse')->insert(['CourseName' => 'Program Design Method', 'CourseDescription' => 'Program Design Method', 'FileName' => '']);
        // DB::table('ltcourse')->insert(['CourseName' => 'Algorithm & Programming', 'CourseDescription' => 'Algorithm & Programming', 'FileName' => '']);
        // DB::table('ltcourse')->insert(['CourseName' => 'Mobile Creative Design', 'CourseDescription' => 'Mobile Creative Design', 'FileName' => '']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('msprivilege')->delete();
        DB::table('msmodule')->delete();
        DB::table('msadminpassword')->delete();
        DB::table('msadmin')->delete();
        DB::table('msuser')->delete();
        DB::table('msmajorcourse')->delete();
        DB::table('ltsmt')->delete();
        DB::table('msbinusianid')->delete();
        DB::table('ltrole')->delete();
        DB::table('ltmajor')->delete();
        DB::table('ltcourse')->delete();
    }
};