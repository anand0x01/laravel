$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

$.pjax.disable()

$(document).on('pjax:start', function () {
    NProgress.start();
    NProgress.set(0.4);
});

$(document).pjax('a:not(a[non-ajax])', 'body');

$(document).on('pjax:end', function () {
    NProgress.done();
    NProgress.remove();
});

$(document).on('submit', 'form[data-pjax]', function (event) {
    $.pjax.submit(event, 'body')
})

$(document).on('pjax:error', function(event){
    alert('An error has occured, please refresh the page.');
});

$(document).on('submit', '#__sbmt_q_mod', function(event) {
    var form = $(this);
    if($.trim($('#sbmt_q_mod_txt').val()).length < 10) {
        alert('Question must contain atleast 10 characters');
        return false;
    } else {
        form.find("button[type='submit']").attr('disabled', 'disabled').text('Submitting..');
        $.pjax.submit(event, 'body');
    }
});

$(document).on('submit', '#__ans_q_modal_form', function(event) {
    var form = $(this);
    if($.trim($('#__ans_q_modal_ans').val()).length < 2) {
        alert('Answer must contain atlest 2 characters');
        return false;
    }
    form.find("button[type='submit']").attr('disabled', 'disabled').text('Submitting..');
    $.pjax.submit(event, 'body');
});

$(document).on('click', '.unanswered_ques', function(e) {
     e.preventDefault()
     var _li = $(this);
     $('#__ans_q_modal_form')
        .find('input[name="question_id"]')
        .val(_li.attr('ques-id'))
        .end()
        .find('#__ans_q_modal_ques')
        .text(_li.text());
     $('#myQuesModal').modal('show');
});

$(document).on('click', '.answered_ques', function(e) {
     e.preventDefault()
     var _li = $(this);
     $('#__ans_q_modal_form')
        .find('input[name="question_id"]')
        .val(_li.attr('ques-id'))
        .end()
        .find('#__ans_q_modal_ques')
        .text(_li.text())
        .end()
        .find('#__ans_q_modal_ans')
        .val(_li.attr('answer'));
     $('#myQuesModal').modal('show');
});

$(document).on("pjax:timeout", function() { return false; });

$(document).on('change', 'select#fm_s_ss_x', function (e) {
    if ($(this).val() != '#') {
        $.pjax({url: $(this).val(), container: 'body'})
    }
});

$(document).on('click', '#main_s_r_dd > li', function (e) {
    var tx = $(this).text();
    $('#main_s_r_dt').text(tx);
    $('#search_cat_s_val').val(tx);
    $(this).parent().parent().find('.dropdown-toggle').dropdown('toggle');
    return false;
});