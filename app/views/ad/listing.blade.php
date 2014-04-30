@extends('layout')
@section('body_class') dashboard_pp_0x @stop
@section('content')
<div class="search_results_zone">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-9">
        <h4 class="text-info thin_text">Showing from {{ $advers->count() }} projects.</h4>
        <hr />
        @if(!is_null($advers))
        @foreach ($advers as $adver)
          <div class="media">
              <div class="pull-left">
                  <img class="media-object" width="64px" height="64px" src="{{ URL::asset($adver->getImageUrl()) }}" alt=".media-object">
              </div>
              <div class="media-body">
                  <h4 class="media-heading"><a href="{{ URL::route('ads.pview', $adver->getSlugData()) }}" class="thin_text h4_link" title="">{{ $adver->getTitle() }}</a></h4>
                  {{ $adver->formattedDesc(200) }}
              </div>
          </div>
          <hr />
        @endforeach
        {{ $advers->links() }}
        @endif
      </div>
    </div>
  </div>
</div>
@stop
