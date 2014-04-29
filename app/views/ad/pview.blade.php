@extends('layout')
@section('body_class') dashboard_pp_0x @stop
@section('content')
<div class="container dashboard_wrapper p_ad_vw">
  <div class="row">
      <div class="col-xs-12">
        <h4><?php echo $adver->getTitle(); ?></h4>
        <hr />
      </div>
      <div class="col-xs-12 col-sm-2">
        <img class="p_db_i img-responsive" src="{{ URL::asset($adver->getImageUrl()) }}">
      </div>
      <div class="col-xs-12 col-sm-10">
        <p><strong>Sector : </strong><?php echo $adver->sectorName(); ?></p>
        <p><strong>Project Type : </strong><?php echo $adver->projectType(); ?></p>
        <p><strong>Contact : </strong><?php echo $adver->getContact(); ?></p>
        <p><strong>Open for : </strong><?php echo $adver->getDegrees(); ?></p>
        <p><strong>Started On : </strong><?php echo $adver->createdTill(); ?></p>
        <p class="text-success"><strong >Students Needed : </strong><span ><?php echo $adver->studentsNo(); ?></span></p>
      </div>
      <div class="col-xs-12">
        <hr />
        <ul class="nav nav-pills">
          <li  class="active"><a href="{{ URL::route('ads.pview', $adver->getSlugData()) }}">Details</a></li>
          @if(Auth::user()->isStudent())
          <li><a href="{{ URL::route('ads.papply', $adver->getSlugData()) }}">Apply</a></li>
          <li><a href="{{ URL::route('ads.pdoubt', $adver->getSlugData()) }}">Doubts</a></li>
          @endif
        </ul>
        <div class="p_ad_tx">
          {{ $adver->formattedDesc()  }}
        </div>
      </div>
  </div>
</div>
@stop
