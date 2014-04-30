<?php
    $lists = Auth::user()->tlists()->with('student')->get();
    $lcount = count($lists);
?>
<div id="__modal_con_gen">
<div class="modal fade" furl="#" faddurl="#" frmvurl="" id="list_nav_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">List of your selected students</h4>
      </div>
      <div class="modal-body">
        <ul id="nav_ll_ul_main" class="list-unstyled">
            @if($lcount)
                @foreach ($lists as $list)
                    <li>
                        <div class="media">
                            <a class="pull-left" href="#">
                               <img  width="64px" height="64px"  class="media-object" src="{{ URL::asset($list->student->displayPic()) }}" alt=".media-object">
                            </a>
                            <div class="media-body">
                                <div class="clearfix">
                                    <h4 class="media-heading pull-left">{{ $list->student->name }}</h4>
                                    <button entryId="{{ $list->id }}" class="btn btn-link pull-right nav_ul_rmv_btn">Remove</button>
                                </div>
                                <ul class="list-unstyled">
                                    <li><strong>Email :</strong> {{ $list->student->email }}</li>
                                </ul>
                            </div>
                        </div>
                       <hr />
                    </li>
                @endforeach
            @else
                <strong>You haven't made any entry in your list</strong>
            @endif
        </ul>
      </div>
      <div class="modal-footer">
        @if($lcount)
            <a type="button" id="modConfBtn" href="#" class="btn btn-primary btn-plain">Confirm</a>
        @else
            <a type="button" id="modConfBtn" disabled="disabled" href="#" class="btn btn-primary btn-plain disabled-link">Confirm</a>
        @endif
      </div>
    </div>
  </div>
</div>
</div>
<li><a non-ajax href="#" data-toggle="modal" data-target="#list_nav_modal" title="List to be shortlisted">List <sup><span id="nav_ll_count" class="label label-success">{{ $lcount }}</span></sup></a></li>