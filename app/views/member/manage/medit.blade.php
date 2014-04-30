@extends('lfooter')
@section('content')
<div class="dashboard_wrapper">
    <div class="container">
        <div class="col-xs-3">
            @include('partials.snav')
        </div>
        <div class="col-xs-9 ox_cont">
            <h3 class="thin_text small_heading">{{ $adver->getTitle() }}</h3>
            <hr class="small_line" />
            @include('partials.manage_pills', array('id' => $adver->id))
            <div class="main_ss_m_cont">
                @if(Session::has('success'))
                <div class="alert alert-dismissable alert-well">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Congratulation!</strong> Details have been updated.</a>.
                </div>
                @endif
                <div class="row">
                    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{  URL::route('dbd.med', array($adver->id)) }}">
                        {{ Form::token()  }}
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Title <span class="text-info">*</span></label>
                          <div class="col-sm-9">
                            {{ Form::text('title', $adver->getTitle(), array('class' => 'form-control', 'required' => 'required', 'autocomplete' => 'off' , 'placeholder' => 'Title of the ad', 'maxlength' => '256')) }}
                            @if($errors->has('title'))
                            {{ $errors->first('title', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                            @endif
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Sector <span class="text-info">*</span></label>
                          <div class="col-sm-9">
                            {{ Form::select('sector', Adver::$sectors, $adver->details->sector_id, array('class' => 'form-control')) }}
                            @if($errors->has('sector'))
                            {{ $errors->first('sector', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                            @endif
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Project Type <span class="text-info">*</span></label>
                          <div class="col-sm-9">
                              <div class="checkbox">
                                <label>
                                  {{ Form::checkbox('project_type[]', 't_s_m', $adver->details->type_sm == 1) }}
                                  Sales and Marketing
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  {{ Form::checkbox('project_type[]', 't_m_r', $adver->details->type_mr == 1) }}
                                  Market Research
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  {{ Form::checkbox('project_type[]', 't_p_d', $adver->details->type_pd == 1) }}
                                  Product Development
                                </label>
                              </div>
                              @if($errors->has('project_type'))
                              {{ $errors->first('project_type', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                              @endif
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Description/Keywords <span class="text-info">*</span></label>
                            <div class="col-sm-9">
                                {{ Form::textarea('description', $adver->details->description, array('class' => 'form-control', 'rows' => '6', 'required' => 'required')) }}
                                @if($errors->has('description'))
                                {{ $errors->first('description', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Project Contact Phone Number</label>
                            <div class="col-sm-9">
                                {{ Form::text('phone', $adver->details->phone, array('class' => 'form-control', 'required' => 'required', 'autocomplete' => 'off' , 'placeholder' => 'Phone number', 'maxlength' => '30')) }}
                                <span class="help-text"><small class="text-info">We use software to create collaboration rooms using your phone number in the E.164 format and our toll free number. You can learn more in our FAQs. Your information will never be shared with anyone.</small></span>
                                @if($errors->has('phone'))
                                {{ $errors->first('phone', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Degree Level</label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('degree[]', 'd_u', $adver->details->degree_ug == 1) }}
                                        Undergrad
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('degree[]', 'd_g', $adver->details->degree_g == 1) }}
                                        Grad
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('degree[]', 'd_p', $adver->details->degree_phd == 1) }}
                                        PHD
                                    </label>
                                </div>
                                @if($errors->has('degree'))
                                {{ $errors->first('degree', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Images</label>
                            <div class="col-sm-9">
                                {{ Form::file('images') }}
                                @if(isset($adver->details->image))
                                <span class="help-block">
                                    <img style="max-height: 200px;" src="{{ URL::asset($adver->details->image) }}">
                                </span>
                                @endif
                                <span class="help-block"><small class="text-info">Maximum file size: 10240 KB.</small></span>
                                @if($errors->has('images'))
                                    {{ $errors->first('images', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Number of students <span class="text-info">*</span></label>
                            <div class="col-sm-9">
                                {{ Form::text('n_stu', $adver->details->students, array('class' => 'form-control', 'required' => 'required', 'autocomplete' => 'off' , 'placeholder' => 'Number of students', 'maxlength' => '3')) }}
                                @if($errors->has('n_stu'))
                                    {{ $errors->first('n_stu', '<span class="help-block"><small class="text-danger">:message</small></span>') }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary btn-plain">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop