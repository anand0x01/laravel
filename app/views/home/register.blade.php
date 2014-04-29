@extends('lfooter')
@section('content')
<div class="main_step_content select_block">
    <div class="container">
        <div class="row">
            <div class="col-xs-5 center-block center-align">
                <a href="{{ URL::route('r.student') }}" type="button" class="btn btn-well">Student</a> <span>&nbsp;&nbsp;&nbsp;&nbsp;OR&nbsp;&nbsp;&nbsp;&nbsp;</span> <a type="button" href="{{ URL::route('r.org') }}" class="btn btn-well">Organisation</a>
            </div>
        </div>
    </div>
</div>
@stop
