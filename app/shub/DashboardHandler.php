<?php namespace shub;

use View;
use Auth;
use DB;
use Adver;
use Advernonpro;
use Advernormals;
use Student;

class DashboardHandler
{
    public static function User3()
    {
        $projects = Adver::where('user_id', Auth::user()->id)->with('details')->get();
        return View::make('member.user3', compact('projects'));
    }

    public static function User1()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        return View::make('member.user1', compact('student'));
    }
}
