@extends('lfooter')

@section('content')

<div class="main_step_wizard">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="stepwizard">
                    <div class="stepwizard-row">
                        <div class="stepwizard-step">
                            <a type="button" href="{{ URL::route('register') }}" class="btn btn-default btn-circle">1</a>
                            <p>Select Account Type</p>
                        </div>
                        <div class="stepwizard-step">
                            <button type="button" class="btn btn-primary btn-circle">2</button>
                            <p>Create Organisation Account</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-6  custom_form center-block">
            <form data-pjax action="{{ URL::route('org3') }}" class='form-horizontal' method="post" accept-charset="utf-8">
                <fieldset>
                    {{ Form::token() }}
                    <div class="form-group">
                      <label for="name" class="col-lg-2 control-label">Name</label>
                      <div class="col-lg-10">
                      {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'required' => 'required', 'autocomplete' => 'off' , 'placeholder' => 'Enter organisation name')) }}
                      @if($errors->has('name'))
                      {{ $errors->first('name', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                      @endif
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-3 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary btn-plain">Submit</button>
                      </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

@stop
