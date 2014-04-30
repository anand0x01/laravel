<?php

class SearchController extends Controller
{
    public function getIndex()
    {
        if(!Input::has('query') || strlen($query = trim(Input::get('query'))) === 0 )
        {
            App::abort(400, 'No search query provided.');
        }
        $category = (Input::has('search_cat')) ? strtolower(Input::get('search_cat')) : 'companies';
        $possible_categories = array('companies', 'students', 'non profit');
        if(!in_array($category, $possible_categories))
        {
            App::abort(400, 'Invalid search category');
        }
        $prep_query = '%'.$query.'%';
        if($category !== $possible_categories[1])
        {
            $ad_type = ($category === $possible_categories[0]) ? 1 : 2;
            $results = Adver::listable()
                        ->where('title', 'like', $prep_query)
                        ->where('ad_type', $ad_type)
                        ->with('details')
                        ->paginate(10);
            return View::make('search.company', compact('query', 'results', 'category'));
        }
        elseif($category === $possible_categories[1] && Auth::user()->isCompanyGuy())
        {
            $results = User::searchable()
                        ->where('name', 'like', $prep_query)
                        ->paginate(10);
            return View::make('search.student', compact('query', 'results', 'category'));
        }
        else
        {
            App::abort(400, 'You are not allowed to search in this category.');
        }
    }

    public function postList()
    {
        if(!Input::has('uid'))
        {
            return Response::json(array('issue' => 'student id not provided.', 'success' => false), 200);
        }

        if(!is_numeric(Input::get('uid')))
        {
            return Response::json(array('issue' => 'proper student id not provided.', 'success' => false), 200);
        }

        $sid = intval(Input::get('uid'));

        $user_check = User::select(array('id'))->find($sid);

        if(is_null($user_check))
        {
            return Response::json(array('issue' => 'invalid student id given.', 'success' => false), 200);
        }

        $new_tlist = Mtmplist::firstOrCreate(array('user_id' => Auth::user()->id, 'student_id' => $sid));

        $lists = Auth::user()->tlists()->with('student')->get();
        $lcount = count($lists);

        $html_op = View::make('partials.lmodalaj', compact('lists', 'lcount'))->render();
        return Response::json(array('success' => true, 'modal_data' => $html_op, 'count' => $lcount));
    }

    public function postRemove()
    {
        if(!Input::has('uid'))
        {
            return Response::json(array('issue' => 'student id not provided.', 'success' => false), 200);
        }

        if(!is_numeric(Input::get('uid')))
        {
            return Response::json(array('issue' => 'proper student id not provided.', 'success' => false), 200);
        }

        $sid = intval(Input::get('uid'));

        DB::table('tmplists')->where('user_id', Auth::user()->id)->where('id', $sid)->delete();

        return Response::json(array('success' => true));
    }
}