<?php

class MemberController extends Controller
{
    public function getDashboard()
    {
        $utype = Auth::user()->user_type;
        if($utype == "3")
        {
            return \shub\DashboardHandler::User3();
        }
        elseif($utype == "1")
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
        $adver = Adver::findOrFail($id);
        if($adver->hasManageRights())
        {
            return View::make('member.manage.medit', compact('adver'));
        }
        else
        {
            App::abort(403, 'You don\' have rights to manage this project.');
        }
    }

    public function getMDoubts($id)
    {
        $adver = Adver::findOrFail($id);
        if($adver->hasManageRights())
        {
            $doubts = $adver->doubts;
            $solved = array();
            $unsolved = array();
            if(count($doubts))
            {
                foreach ($doubts as $doubt)
                {
                    $vx = (is_null($doubt->answer)) ? 'unsolved' : 'solved';
                    ${$vx}[] = $doubt;
                }
            }
            return View::make('member.manage.mdoubt', compact('adver', 'doubts', 'solved', 'unsolved'));
        }
        else
        {
            App::abort(403, 'You don\' have rights to manage this project.');
        }
    }

    public function postSAnswer($id)
    {
        $adver = Adver::findOrFail($id);

        if($adver->hasManageRights())
        {
            $rules = array(
                'question_id' => 'required|integer',
                'answer' => 'required|min:2'
            );

            $v = Validator::make(Input::all(), $rules);

            if($v->fails())
            {
                return Redirect::back()->withErrors($v)->with('valid', 'Form Validation error.');
            }

            $ques = Adoubt::where('adver_id', $id)->findOrFail(Input::get('question_id'));
            $ques->answer = htmlentities(trim(Input::get('answer')));
            $ques->save();

            return Redirect::back();
        }
        else
        {
            App::abort(403, 'You don\' have rights to manage this project.');
        }
    }

    public function getDResume($hash)
    {
        $hasher = new \shub\HashIds();
        $decrypt_arr = $hasher->decrypt($hash);
        if(count($decrypt_arr) == 4)
        {
            // projectid, responseid, userid, studentid
            $adver = Adver::findOrFail($decrypt_arr[0]);
            if($adver->hasManageRights())
            {
                $response = Aresponse::where('adver_id', $decrypt_arr[0])
                                ->where('user_id', $decrypt_arr[2])
                                ->findOrFail($decrypt_arr[1]);
                $student = Student::findOrFail($decrypt_arr[3]);

                $headers = array(
                  'Content-Type: application/pdf',
                );

                if(is_null($student->resume))
                {
                    App::abort(404);
                }

                $file = public_path() . '/' . $student->resume;

                return Response::download($file, $hash.'.pdf', $headers);
            }
            else
            {
                App::abort(403, 'You don\' have rights to view this resume.');
            }
        }
        else
        {
            App::abort(404);
        }
    }

    public function getMResponses($id)
    {
        $adver = Adver::findOrFail($id);

        if($adver->hasManageRights())
        {
            $responses = $adver->responses()->with('user','user.students')->paginate(10);

            $hasher = new \shub\HashIds();

            return View::make('member.manage.mresponses', compact('adver', 'responses', 'hasher'));
        }
        else
        {
            App::abort(403, 'You don\' have rights to manage this project.');
        }
    }


}
