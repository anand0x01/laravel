<?php

class MemberController extends Controller
{
    public function getDashboard()
    {
        $utype = Auth::user()->user_type;
        if($utype === 3)
        {
            return \shub\DashboardHandler::User3();
        }
        elseif($utype === 1)
        {
            return \shub\DashboardHandler::User1();
        }
        var_dump(Auth::user());
    }

    public function postResume()
    {
        $v = Validator::make(Input::all(), array('resume' => 'required|mimes:pdf|max:10240'));
        if($v->fails())
        {
            return Redirect::back()->withErrors($v);
        }
        $file = Input::file('resume');
        $destination = 'resumes/' . date('Y') . '/' . date('m') . '/' . date('d');
        $str = Str::quickRandom(14) . '.' . $file->getClientOriginalExtension();
        $usuccess = $file->move($destination, $str);
        if($usuccess)
        {
            DB::table('students')
                ->where('user_id', Auth::user()->id)
                ->update(array('resume' => $destination.'/'.$str));
            return Redirect::back();
        }
        else
        {
            App::abort(500, 'Error while uploading your resume');
        }
    }

    public function getManage($id)
    {
        $adver = Adver::findOrFail($id);
        if($adver->hasManageRights())
        {
            return View::make('member.manage.manage', compact('adver'));
        }
        else
        {
            App::abort(403, 'You don\'t have rights to manage this project.');
        }
    }

    public function getMEdit($id)
    {

    }
}
