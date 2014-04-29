<?php

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function getIndex()
	{
		return View::make('home.index');
	}

	public function getFaqs()
	{
		return View::make('home.faqs');
	}

	public function getContact()
	{
		return View::make('home.contact');
	}

	public function getPricing()
	{
		return View::make('home.pricing');
	}

	public function getUniv()
	{
		$data = array(
            'univs' => DB::table('universities')->select(array('domain', 'name'))->get(),
        );
        return View::make('home.univ', $data);
	}
}
