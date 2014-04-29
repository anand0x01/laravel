@extends('lfooter')

@section('content')
<div class="dashboard_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
              @include('partials.1snav')
            </div>
            <div class="col-xs-9 ox_cont">
                <h3 class="thin_text small_heading">Dashboard</h3>
                <hr class="small_line" />
                @if(is_null($student->resume))
                <p>You have not uploaded your resume upload your resume upload your resume for better chances of getting selected.</p>
                <form action="{{ URL::route('dbd.sr') }}" role="form" method="post" enctype="multipart/form-data">
                  {{ Form::token() }}
                  <div class="form-group">
                      <label for="resume"><b>Your resume in pdf</b></label>
                      <input type="file" name="resume" required>
                      @if($errors->has('resume'))
                      {{ $errors->first('resume', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                      @endif
                  </div>
                  <button type="submit" class="btn btn-primary btn-plain">Submit</button>
                </form>
                @else
                <p>You have already uploaded you resume explore the listings section to explore ads as per your intrest.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
