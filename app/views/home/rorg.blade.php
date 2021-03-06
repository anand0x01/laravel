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
            <form data-pjax method="post" action="{{ URL::route('r.org') }}" class="form-horizontal">
                {{ Form::token() }}
              <fieldset>
                <div class="form-group">
                  <label for="name" class="col-lg-2 control-label">Name</label>
                  <div class="col-lg-10">
                  {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'required' => 'required', 'autocomplete' => 'off' , 'placeholder' => 'Enter your name')) }}
                  @if($errors->has('name'))
                  {{ $errors->first('name', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                  @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-lg-2 control-label">Email</label>
                  <div class="col-lg-10">
                  {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'required' => 'required', 'autocomplete' => 'off', 'placeholder' => 'Enter email', 'required' => 'required')) }}
                    @if($errors->has('email'))
                    {{ $errors->first('email', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-lg-2 control-label">Password</label>
                  <div class="col-lg-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                    @if($errors->has('password'))
                        {{ $errors->first('password', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                    @endif
                    <span class="help-block"><small class='text-info'>The password should be at least seven characters long</small></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="rpassword" class="col-lg-2 control-label">Password Again</label>
                  <div class="col-lg-10">
                    <input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="Password Again"autocomplete="off">
                    @if($errors->has('rpassword'))
                        {{ $errors->first('rpassword', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
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
