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
                @if(count($doubts) == 0)
                    <h5 class="text-info">No doubts have been asked for your project.</h5>
                @else
                    <h4 class="thin_text">Unanswered Questions</h4>
                    <hr class="small_line" />
                    @if(count($unsolved))
                        <ol>
                            @foreach($unsolved as $ques)
                                <li  ><p><a class="unanswered_ques" ques-id="{{ $ques->id }}" href="#"><strong>{{ $ques->doubt }}</strong></a></p></li>
                            @endforeach
                        </ol>
                    @else
                        <h5 class="text-info">No unanswered questions.</h5>
                    @endif
                    <h4 class="thin_text">Answered Questions</h4>
                    <hr class="small_line" />
                    @if(count($solved))
                        <ol>
                            @foreach($solved as $ques)
                                <li>
                                    <p><a class="answered_ques" ques-id="{{ $ques->id }}" answer="{{ $ques->answer }}" href="#"><strong>{{ $ques->doubt }}</strong></a></p>
                                    <p class="db_ans_ans"><strong>Answer :- <p>{{ preg_replace('/[\r\n]+/', '</p><p>', $ques->answer) }} </p></strong> </p>
                                </li>
                            @endforeach
                        </ol>
                    @else
                        <h5 class="text-info">No answered questions.</h5>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>

<div role="dialog" class="modal" id="myQuesModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="clearfix">
          <h4 class="modal-title pull-left">Write Answer</h4>
          <!-- <a href="#" id="myQuesModalDel" delLink="#" class="btn btn-link pull-right">Delete Question</a> -->
        </div>
      </div>
      <form id="__ans_q_modal_form" accept-charset="utf-8" method="post" action="{{ URL::route('dbd.mdbt', array($adver->id)) }}">
          {{ Form::token() }}
          {{ Form::hidden('question_id') }}
          <div class="modal-body">
              <p><strong id="__ans_q_modal_ques"><!-- Space for question --></strong></p>
              <textarea id="__ans_q_modal_ans" name="answer" placeholder="Write your answer" class="form-control" rows="5"></textarea>
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-default btn-plain" data-dismiss="modal">Close</button>
                <button type="submit" quesId="#" id="myQuesModalSave" type="button" class="btn btn-primary btn-plain">Save changes</button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@if(Session::has('valid'))
<script>
alert('{{ Session::get('valid') }}');
</script> 
@endif
@stop