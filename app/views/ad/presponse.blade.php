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
          <li  class=""><a href="{{ URL::route('ads.pview', $adver->getSlugData()) }}">Details</a></li>
          <li class="active"><a href="{{ URL::route('ads.papply', $adver->getSlugData()) }}">Apply</a></li>
          <li><a href="{{ URL::route('ads.pdoubt', $adver->getSlugData()) }}">Doubts</a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-md-offset-2">
          <h4>Cover Letter</h4>
          <hr />
          @if(Session::has('applymsg'))
            <div class="alert alert-info alert-plain fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><strong>{{ Session::get('applymsg') }}</strong></p>
            </div>
          @endif
          <form data-pjax action="{{ URL::route('ads.papply', $adver->getSlugData()) }}" method="post" accept-charset="utf-8">
            {{ Form::token() }}
            <textarea class="form-control" name="short_summary"  rows="8" placeholder="Write a short summary about why you would be fit for the job.">{{ $response->response or '' }}</textarea>
            @if($errors->has('short_summary'))
            {{ $errors->first('short_summary', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
            @endif
            <div style="padding-top: 20px;" class="form-group">
              <button type="submit" class="btn btn-primary btn-plain pull-right">Submit</button>
            </div>
          </form>
        </div>
  </div>
</div>
@stop
