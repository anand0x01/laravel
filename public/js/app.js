
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

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
})

$(document).on("pjax:timeout", function() { return false; });

$(document).on('change', 'select#fm_s_ss_x', function (e) {
    if ($(this).val() != '#') {
        $.pjax({url: $(this).val(), container: 'body'})
    }
});

