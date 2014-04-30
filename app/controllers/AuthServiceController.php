<?php

class AuthServiceController extends Controller
{
    public function getIndex()
    {
        return View::make('home.login');
    }

    public function postIndex()
    {
        $c = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        $r = ((Input::get('remember_me') === 'yes') ? true : false);

        if(!Auth::attempt($c, $r))
        {
            $m = new \Illuminate\Support\MessageBag(array(
                'error' => 'Authentication details incorrect',
            ));

            return Redirect::back()->withInput(Input::except('password'))->withErrors($m);
        }

        return Redirect::route('home');
    }

    public function anyLogout()
    {
        Auth::logout();
        return Redirect::route('home');
    }

    public function getRegister()
    {
        return View::make('home.register');
    }

    public function anyRStudent()
    {
        return View::make('home.rstudent');
    }

    public function postRStudent()
    {
        if(Input::has('email'))
        {
            if(filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL))
            {
                $e = explode('@', Input::get('email'));
                $domain = array_pop($e);
                $ddata = DB::table('universities')->where('domain', $domain)->first();
                if(is_null($ddata))
                {
                    return Redirect::route('univ');
                }
            }
        }

        $rules = array(
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|min:8|max:20',
            'rpassword' => 'required|same:password',
        );

        $attributes = array(
            'rpassword' => 'repeated password',
        );

        $v = Validator::make(Input::all(), $rules, $attributes);

        if($v->fails())
        {
            return Redirect::back()->withErrors($v)->withInput(Input::except('password'));
        }

        $user = new User;
        DB::transaction(function () use (&$user, $ddata)
        {
            $user->email = trim(Input::get('email'));
            $user->password = Hash::make(Input::get('password'));
            $user->name = trim(Input::get('name'));
            $user->save();

            $student = new Student;
            $student->user_id = $user->id;
            $student->country_id = $ddata->country_id;
            $student->save();
        });

        Auth::loginUsingId($user->id);

        return Redirect::route('home');
    }

    public function getROrg()
    {
        return View::make('home.rorg');
    }

    public function postROrg()
    {
        $rules = array(
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|min:8|max:20',
            'rpassword' => 'required|same:password',
        );

        $attributes = array(
            'rpassword' => 'repeated password',
        );

        $v = Validator::make(Input::all(), $rules, $attributes);

        if($v->fails())
        {
            return Redirect::back()->withErrors($v)->withInput(Input::except('password'));
        }

        $user = new User;
        DB::transaction(function () use (&$user)
        {
            $user->email = trim(Input::get('email'));
            $user->password = Hash::make(Input::get('password'));
            $user->name = trim(Input::get('name'));
            $user->user_type = 2;
            $user->save();

            Auth::loginUsingId($user->id);

            DB::table('organisations')->insert(array(
                'user_id' => Auth::user()->id,
                'domain' => Auth::user()->getDomain(),
                'balance' => '0',
                'name' => 'Voodo\'s Organisation',
            ));

        });

        Session::flash('orgstep3', true);
        return Redirect::route('org3');
    }

    public function getROrg3()
    {
        if(Session::has('orgstep3') && Session::get('orgstep3'))
        {
            Session::flash('orgvalid', true);
            return View::make('home.org3');
        }
        App::abort(403, 'Unauthorized action');
    }

    public function postROrg3()
    {
        if(Session::has('orgvalid'))
        {
            $rules = array(
                'name' => 'required|min:3|max:100',
            );

            $v = Validator::make(Input::all(), $rules);

            if($v->fails())
            {
                Session::reflash();
                return Redirect::back()->withErrors($v)->withInput();
            }

            DB::transaction(function()
            {
                $user = Auth::user();
                $user->user_type = 3;
                $user->save();

                Db::table('organisations')->where('user_id', $user->id)->update(array(
                    'name' => trim(Input::get('name')),
                ));
            });

            return Redirect::route('home');
        }
        //App::abort(403, 'Unauthorized action');
    }
}
