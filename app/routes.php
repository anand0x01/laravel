<?php

Route::pattern('slug', '[a-z0-9-]+');
Route::pattern('hash', '[0-9a-zA-Z]+');

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
Route::get('/faqs', array('as' => 'faqs', 'uses' => 'HomeController@getFaqs'));
Route::get('/contact', array('as' => 'contact', 'uses' => 'HomeController@getContact'));
Route::get('/pricing', array('as' => 'pricing', 'uses' => 'HomeController@getPricing'));
Route::get('/login', array('as' => 'login', 'uses' => 'AuthServiceController@getIndex', 'before' => 'guest'));
Route::post('/login', array('uses' => 'AuthServiceController@postIndex', 'before' => 'csrf|guest'));
Route::any('/logout', array('as' => 'logout', 'uses' => 'AuthServiceController@anyLogout', 'before' => 'auth'));
Route::get('/register', array('as' => 'register', 'uses' => 'AuthServiceController@getRegister', 'before' => 'guest'));
Route::get('/register/student', array('as' => 'r.student', 'uses' => 'AuthServiceController@anyRStudent', 'before' => 'guest'));
Route::post('/register/student', array('uses' => 'AuthServiceController@postRStudent', 'before' => 'csrf|guest'));
Route::get('/r/university', array('as' => 'univ', 'uses' => 'HomeController@getUniv'));
Route::get('/register/organisation', array('as' => 'r.org', 'uses' => 'AuthServiceController@getROrg', 'before' => 'guest'));
Route::post('/register/organisation', array('uses' => 'AuthServiceController@postROrg', 'before' => 'guest|csrf'));
Route::get('/register/organisation/3', array('as' => 'org3', 'uses' => 'AuthServiceController@getROrg3', 'before' => 'auth_ck|company_guy'));
Route::post('/register/organisation/3', array('uses' => 'AuthServiceController@postROrg3', 'before' => 'csrf|auth_ck|company_guy'));
Route::get('/dashboard', array('as' => 'dbd', 'uses' => 'MemberController@getDashboard', 'before' => 'auth'));
Route::get('/add-new', array('as' => 'cad', 'uses' => 'AdsController@getCreate', 'before' => 'auth|company_guy'));
Route::get('/add-new/comapny', array('as' => 'ad.c', 'uses' => 'AdsController@getCCompany', 'before' => 'auth|company_guy'));
Route::post('/add-new/comapny', array('uses' => 'AdsController@postCCompany', 'before' => 'csrf|auth|company_guy'));
Route::get('/add-new/non-profit', array('as' => 'ad.np', 'uses' => 'AdsController@getNProfit', 'before' => 'auth|company_guy'));
Route::post('/add-new/non-profit', array('uses' => 'AdsController@postNProfit', 'before' => 'csrf|auth|company_guy'));
Route::get('/ads', array('as' => 'ads', 'uses' => 'AdsController@getListing', 'before' => 'auth'));

// ads public view.
Route::get('/ads/{hash}/{slug}', array('as' => 'ads.pview', 'uses' => 'AdsController@getPView', 'before' => 'auth'));
Route::get('/ads/{hash}/{slug}/apply', array('as' => 'ads.papply', 'uses' => 'AdsController@getPApply', 'before' => 'auth|student_only'));
Route::post('/ads/{hash}/{slug}/apply', array('uses' => 'AdsController@postPApply', 'before' => 'csrf|auth|student_only'));
Route::get('/ads/{hash}/{slug}/doubts', array('as' => 'ads.pdoubt', 'uses' => 'AdsController@getPDoubt', 'before' => 'auth|student_only'));
Route::post('/ads/{hash}/{slug}/doubts', array('uses' => 'AdsController@postPDoubt', 'before' => 'csrf|auth|student_only'));

//resume upload feature.
Route::post('/dashboard/resume', array('as' => 'dbd.sr', 'uses' => 'MemberController@postResume', 'before' => 'csrf|auth|student_only'));
Route::get('/dashboard/manage/{hash}', array('as' => 'dbd.mng', 'uses' => 'MemberController@getManage', 'before' => 'auth|company_guy'));
Route::get('/dashboard/manage/{hash}/edit', array('as' => 'dbd.med', 'uses' => 'MemberController@getMEdit', 'before' => 'auth|company_guy'));
Route::post('dashboard/manage/{hash}/edit', array('uses' => 'AdsController@postEditProject', 'before' => 'csrf|auth|company_guy'));
Route::get('/dashboard/manage/{hash}/doubts', array('as' => 'dbd.mdbt', 'uses' => 'MemberController@getMDoubts', 'before' => 'auth|company_guy'));
Route::post('/dashboard/manage/{hash}/doubts', array('uses' => 'MemberController@postSAnswer', 'before' => 'csrf|auth|company_guy'));
Route::get('/dashboard/manage/{hash}/responses', array('as' => 'dbd.mdr', 'uses' => 'MemberController@getMResponses', 'before' => 'auth|company_guy'));
Route::get('/resume/{hash}', array('as' => 'dbd.mdrsum', 'uses' => 'MemberController@getDResume', 'before' => 'auth|company_guy'));
Route::get('/search', array('as' => 'search.p', 'uses' => 'SearchController@getIndex'));
Route::post('/ladd', array('as' => 'ladd', 'uses' => 'SearchController@postList', 'before' => 'ajax|auth|company_guy'));
Route::post('/lrmv', array('as' => 'lrmv', 'uses' => 'SearchController@postRemove', 'before' => 'ajax|auth|company_guy'));
/*Route::get('/', function()
{
    $list = Auth::user()->tlists()->with('student')->get();
    var_dump($list[0]);
    var_dump(DB::getQueryLog());
});*/