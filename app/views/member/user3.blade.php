@extends('lfooter')

@section('content')
<div class="dashboard_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                @include('partials.snav')
            </div>
            <div class="col-xs-9 ox_cont">
                <h3 class="thin_text small_heading">Dashboard</h3>
                <hr class="small_line" />
                @if(Session::has('msg'))
                <div class="alert alert-info alert-plain fade in">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <p>{{ Session::get('msg') }}</p>
                </div>
                @endif
                <p class="text-success">Below you will find a listing of all your classified ads. Click on one of the options to perform a specific task. If you have any questions, please contact the site administrator.</p>
                @if(false)
                    <p class="">You have not created any ad yet. You can <a href="#">Create a new ad</a> or start searching.</p>
                @else
                    <table class="table small_p">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Options</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($projects as $index => $project)
                            <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>
                                <p>{{ $project->getTitle() }}</p>
                                <p><a href="#">{{ $project->sourceType() }}</a> | {{ $project->fcreatedOn() }}</p>
                              </td>
                              <td>{{ $project->getStatus() }}</td>
                              <td>
                                <p><a href="{{ URL::route('dbd.mng', array($project->id)) }}">Manage</a></p>
                              </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
