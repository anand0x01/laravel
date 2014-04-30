<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
    //
});


App::after(function($request, $response)
{

});

/*App::finish(function($request, $response)
{
    if(!Request::ajax())
        var_dump(DB::getQueryLog());
});*/

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('ajax', function()
{
    if(!Request::ajax())
        App::abort(412, 'Non-ajax requests are not allowed.');
});

Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::guest('login');
    if(Auth::user()->user_type == 2)
    {
        Session::flash('orgstep3', true);
        return Redirect::route('org3');
    }
});

Route::filter('auth_ck', function()
{
    if (Auth::guest()) return Redirect::guest('login');
});

Route::filter('company_guy', function()
{
    if(Auth::user()->isStudent()) App::abort(403, 'This section is not open for students.');
});

Route::filter('student_only', function()
{
    if(!Auth::user()->isStudent()) App::abort(403, 'This section is only open for students.');
});

Route::filter('auth.basic', function()
{
    return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
    if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
    $token = Request::ajax() ? Request::header('X-CSRF-Token') : Input::get('_token');

    if (Session::token() != $token)
    {
        App::abort(403, 'Session token mismatch.');
    }
});
