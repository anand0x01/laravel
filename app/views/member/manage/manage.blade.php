@extends('lfooter')

@section('content')
<div class="dashboard_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                @include('partials.snav')
            </div>
            <div class="col-xs-9 ox_cont">
              <h3 class="thin_text small_heading">{{ $adver->getTitle() }}</h3>
              <hr class="small_line" />
              @include('partials.manage_pills', array('id' => $adver->id))
              <div class="main_ss_m_cont">
                <h4 class="">Details</h4>
                <hr class="small_line" />
                <dl class="dl-horizontal">
                  <dt>Status</dt>
                  <dd>{{ $adver->getStatus() }}</dd>
                  <dt>Active Till</dt>
                  <dd>{{ $adver->activeTill() }}</dd>
                  <dt>Created On</dt>
                  <dd>{{ $adver->createdTill() }}</dd>
                  <dt>Total Views</dt>
                  <dd>{{ $adver->aviews()->count() }}</dd>
                  <dt>Total responses</dt>
                  <dd>{{ $adver->responses()->count() }}</dd>
                  <dt>Total doubts</dt>
                  <dd>{{ $adver->doubts()->count() }}</dd>
                </dl>
                <h4 id="dash_ac_head">Actions</h4>
                <hr class='small_line' />
                @include('partials.manage_buttons', array('btns' => $adver->getActions()))
                <h4>Information</h4>
                  <hr class="small_line" />
                  <div class="project_dash_box">
                    <div class="row">
                      <div class="col-sm-3">
                          <img class="p_db_i img-responsive" src="{{ URL::asset($adver->getImageUrl()) }}">
                      </div>
                      <div class="col-sm-9">
                        <p><strong>Title : </strong>{{ $adver->getTitle() }}</p>
                        <p><strong>Sectors : </strong>{{ $adver->sectorName() }}</p>
                        <p><strong>Contact : </strong>{{ $adver->getContact() }}</p>
                        <p><strong>Degrees : </strong>{{ $adver->getDegrees() }}</p>
                      </div>
                      <div class="col-xs-12 p_db_dsc">
                        {{ $adver->formattedDesc()  }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@stop
