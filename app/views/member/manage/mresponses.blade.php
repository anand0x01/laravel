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
                @if($responses->count() == 0)
                    <p><strong class="text-info">No submissions have been made to this project.</strong></p>
                @else
                    @foreach($responses as $response)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" width="100px" height="100px" src="{{ URL::asset($response->user->displayPic()) }}" alt="#">
                            </a>
                            <div class="media-body">
                                <a href="#"><h5 class="media-heading text-info">{{ $response->user->name }}</h5></a>
                                <p>{{ $response->response }}</p>
                                <ul class="list-inline">
                                    @if(is_null($response->user->students->resume))
                                        <li><a href="#">Resume not provided</a></li>
                                    @else
                                        <li><a non-ajax href="{{ URL::route('dbd.mdrsum', array($hasher->encrypt($adver->id, $response->id, $response->user->id, $response->user->students->id))) }}">Resume</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    {{ $responses->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@stop