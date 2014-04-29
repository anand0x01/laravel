<?php

class AdsController extends Controller
{
    public function getCreate()
    {
        return View::make('ad.create');
    }

    public function getCCompany()
    {
        $sectors = Adver::$sectors;
        $catg = 'Company';
        $furl = 'ad.c';
        return View::make('ad.company', compact('sectors', 'catg', 'furl'));
    }

    public function postCCompany()
    {
        $rules = array(
            'title' => 'required|between:5,256',
            'sector' => 'required',
            'project_type' => 'required',
            'description' => 'required',
            'phone' => 'required|min:10',
            'degree' => 'required',
            'n_stu' => 'required|integer|max:999|min:1',
            'images' => 'image|max:10240'
        );

        $attributes = array(
            'project_type' => 'project type',
            'n_stu' => 'number of students'
        );

        $v = Validator::make(Input::all(), $rules, $attributes);

        if($v->fails())
        {
            return Redirect::back()->withErrors($v)->withInput();
        }

        //$image = \shub\FormHandler::uploadImage('images');

        DB::transaction(function ()
        {
            $nad = new Adver;
            $nad->user_id = Auth::user()->id;
            $nad->ad_type = 1;
            $nad->title = trim(Input::get('title'));
            $nad->save();

            $snad = new Advernormals;
            $snad->adver_id = $nad->id;
            $snad->sector_id = Input::get('sector');
            $snad->type_sm = in_array('t_s_m', Input::get('project_type'));
            $snad->type_mr = in_array('t_m_r', Input::get('project_type'));
            $snad->type_pd = in_array('t_p_d', Input::get('project_type'));
            $snad->description = htmlentities(trim(Input::get('description')));
            $snad->phone = Input::get('phone');
            $snad->degree_ug = in_array('d_u', Input::get('degree'));
            $snad->degree_g = in_array('d_g', Input::get('degree'));
            $snad->degree_phd = in_array('d_p', Input::get('degree'));
            $snad->image = \shub\FormHandler::uploadImage('images');
            $snad->students = Input::get('n_stu');
            $snad->save();
        });

        return Redirect::route('dbd');
    }

    public function getNProfit()
    {
        $sectors = Adver::$sectors;
        $catg = 'Non - Profit';
        $furl = 'ad.np';
        return View::make('ad.company', compact('sectors', 'catg', 'furl'));
    }

    public function postNProfit()
    {
        $rules = array(
            'title' => 'required|between:5,256',
            'sector' => 'required',
            'project_type' => 'required',
            'description' => 'required',
            'phone' => 'required|min:10',
            'degree' => 'required',
            'n_stu' => 'required|integer|max:999|min:1',
            'images' => 'image:max:10240'
        );

        $attributes = array(
            'project_type' => 'project type',
            'n_stu' => 'number of students'
        );

        $v = Validator::make(Input::all(), $rules, $attributes);

        if($v->fails())
        {
            return Redirect::back()->withErrors($v)->withInput();
        }

        //$image = \shub\FormHandler::uploadImage('images');

        DB::transaction(function ()
        {
            $nad = new Adver;
            $nad->user_id = Auth::user()->id;
            $nad->ad_type = 2;
            $nad->title = trim(Input::get('title'));
            $nad->save();

            $snad = new Advernormals;
            $snad->adver_id = $nad->id;
            $snad->sector_id = Input::get('sector');
            $snad->type_sm = in_array('t_s_m', Input::get('project_type'));
            $snad->type_mr = in_array('t_m_r', Input::get('project_type'));
            $snad->type_pd = in_array('t_p_d', Input::get('project_type'));
            $snad->description = htmlentities(trim(Input::get('description')));
            $snad->phone = Input::get('phone');
            $snad->degree_ug = in_array('d_u', Input::get('degree'));
            $snad->degree_g = in_array('d_g', Input::get('degree'));
            $snad->degree_phd = in_array('d_p', Input::get('degree'));
            $snad->image = \shub\FormHandler::uploadImage('images');
            $snad->students = Input::get('n_stu');
            $snad->save();
        });

        return Redirect::route('dbd');
    }

    public function getListing()
    {
        $advers = Adver::listable()->with('details')->paginate(10);
        return View::make('ad.listing', compact('advers'));
    }

    public function getPView($id, $slug)
    {
        $adver = Adver::listable()->findOrFail($id);
        if($adver->getSlugData()[1] !== $slug)
            return Redirect::route('ads.pview', $adver->getSlugData());

        $nview = new Adview;
        $nview->user_id = Auth::user()->id;
        $nview->adver_id = $id;
        $nview->save();

        return View::make('ad.pview', compact('adver'));
    }

    public function getPApply($id, $slug)
    {
        $adver = Adver::listable()->findOrFail($id);
        if($adver->getSlugData()[1] !== $slug)
            return Redirect::route('ads.pview', $adver->getSlugData());
        $response = $adver->responses()->where('user_id', Auth::user()->id)->first();
        return View::make('ad.presponse', compact('adver', 'response'));
    }

    public function postPApply($id, $slug)
    {
        $adver = Adver::listable()->findOrFail($id);
        $rules = array(
            'short_summary' => 'required|min:10',
        );

        $v = Validator::make(Input::all(), $rules, array('short_summary' => 'Short summery'));
        if($v->fails())
        {
            return Redirect::back()->withErrors($v);
        }
        $response = Aresponse::firstOrNew(array('adver_id' => $id, 'user_id' => Auth::user()->id));
        $response->response = trim(Input::get('short_summary'));
        $response->save();
        Session::flash('applymsg', 'Your response has been saved');
        return Redirect::back();
    }

    public function getPDoubt($id, $slug)
    {
        $adver = Adver::listable()->findOrFail($id);
        if($adver->getSlugData()[1] !== $slug)
            return Redirect::route('ads.pdoubt', $adver->getSlugData());
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
        return View::make('ad.pdoubt', compact('adver', 'doubts', 'solved', 'unsolved'));
    }

    public function postPDoubt($id, $slug)
    {
        $adver = Adver::listable()->findOrFail($id);
        $v = Validator::make(Input::all(), array('question' => 'required|min:10|max:1000'));
        if($v->fails())
        {
            return Redirect::back()->withErrors($v)->withInput();
        }
        $doubt = new Adoubt;
        $doubt->adver_id = $id;
        $doubt->user_id = Auth::user()->id;
        $doubt->doubt = htmlentities(trim(Input::get('question')));
        $doubt->save();
        return Redirect::back();
    }
}
