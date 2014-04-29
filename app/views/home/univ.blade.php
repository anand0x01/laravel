@extends('lfooter')

@section('content')

<div class="container form_block">
    <div class="row">
        <div class="col-xs-12">
            <p>Sorry but it seems your university domain name is yet to be approved from <b>SenseiHub</b>. </p>
            <p>Here is the list of all universities along with their domain names validated by us.</p>

            @if(isset($univs) && count($univs))
            <ol>
                @foreach ($univs as $univ)
                    <li><strong>{{ $univ->name }}</strong> - ({{ $univ->domain }})</li>
                @endforeach
            </ol>
            @endif

        </div>
    </div>
</div>

@stop
