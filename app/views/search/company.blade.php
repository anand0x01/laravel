@extends('lfooter')

@section('body_class') dashboard_pp_0x @stop

@section('content')
<div class="search_zone">
    <div class="container">
        <div class="row">
            <div class="col-xs-7">
            <form data-pjax method="get" action="{{ URL::route('search.p') }}" >
                <div class="input-group">
                  <input value="{{ $query }}" type="text" name="query" placeholder="Search for anything" class="form-control" required>
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle reset_radius" data-toggle="dropdown"><span id="main_s_r_dt">Companies</span> <span class="caret"></span></button>
                    <input type="hidden" id="search_cat_s_val" name="search_cat" value="companies" />
                    <ul id="main_s_r_dd" class="dropdown-menu pull-right">
                      <li><a non-ajax href="#">Companies</a></li>
                      <li><a non-ajax href="#">Non Profit</a></li>
                      @if(Auth::check() && Auth::user()->isCompanyGuy())
                      <li><a non-ajax href="#">Students</a></li>
                      @endif
                    </ul>
                    <button type="submit" class="btn btn-default" type="button">Go!</button>
                  </div><!-- /btn-group -->
                </div><!-- /input-group -->
            </form>
            </div>
        </div>
    </div>
</div>
<div class="search_results_zone">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-9">
        <h5 class="text-info">Search for {{ $query }} in {{ $category }} returned {{ $results->getTotal() }} results</h5>
        <hr />
        @if($results->count())
            @foreach ($results as $value)
              <div class="media">
                  <div class="pull-left">
                      <img class="media-object" width="64px" height="64px" src="{{ URL::asset($value->getImageUrl()) }}" alt=".media-object">
                  </div>
                  <div class="media-body">
                      <h4 class="media-heading"><a href="{{ URL::route('ads.pview', $value->getSlugData()) }}" class="thin_text h4_link" title="">{{ $value->getTitle() }}</a></h4>
                      {{ $value->formattedDesc(200) }}
                  </div>
              </div>
              <hr />
            @endforeach
            {{ $results->appends(array('query' => $query, 'search_cat' => $category))->links() }}
        @else
            <h5 class="text-info">No search results were found.</h5>
        @endif
      </div>
    </div>
  </div>
</div>
@stop