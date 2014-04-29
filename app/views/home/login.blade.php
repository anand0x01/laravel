@extends('lfooter')

@section('content')

<div class="container form_block">
    <div class="row">
        <div class="col-xs-6  custom_form  center-block">
            <form data-pjax method="post" action="{{ URL::route('login') }}" class="form-horizontal">
                {{ Form::token() }}
              <fieldset>
                <div class="form-group">
                  <label for="email" class="col-lg-2 control-label">Email</label>
                  <div class="col-lg-10">
                    {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'required' => 'required', 'autocomplete' => 'off', 'placeholder' => 'Enter email', 'required' => 'required')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-lg-2 control-label">Password</label>
                  <div class="col-lg-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                    @if($errors->has('error'))
                    {{ $errors->first('error', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                    @endif
                    <div class="checkbox form_checkbox">
                      <label>
                        {{ Form::checkbox('remember_me', 'yes') }} Remember Me
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-3 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <div class="col-lg-7 forgot_fix">
                    <a href="#">Forgot Password</a>
                  </div>
                </div>
              </fieldset>
            </form>
        </div>
    </div>
</div>

@stop
