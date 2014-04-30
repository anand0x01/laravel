(function($, window, document) {

    var postRequest = function (url, data) {
        data = (typeof data !== 'undefined') ? data : {};
        var preq = $.ajax({
           url: url,
           type: "POST",
           data: data,
           dataType: "json"
        });
        preq.fail(function() {
            alert('Network Error please refresh the page');
        });
        return preq;
    }

    var update_list = function(data) {
        $('#nav_ll_count').text(data.count);
        $('#__modal_con_gen').html(data.modal_data);
    }

    $(document).on('click', '.btn_list_add', function(e) {
       var btn = $(this);
       btn.attr('disabled', 'disabled');
       var req = postRequest($('#__right_nav_menu').attr('furl'), {
           uid: btn.attr('userId')
       }).done(function(data) {
           if(data.success) {
                update_list(data);
           } else {
                alert('There was some error processing your request.')
           }
       }).complete(function() {
            btn.removeAttr('disabled');
       });
    });

    $(document).on('click', '.nav_ul_rmv_btn', function (e) {
        var btn = $(this);
        btn.attr('disabled', 'disabled');
        var req = postRequest($('#__right_nav_menu').attr('rmvurl'), {
            uid: btn.attr('entryId')
        });
        req.done(function (data) {
            if (data.hasOwnProperty('success') && data.success) {
                btn.parent().parent().parent().parent().remove();
                var list_count = parseInt($('#nav_ll_count').text()) - 1;
                $('#nav_ll_count').text(list_count);
                if(!list_count) {
                    $('#modConfBtn').attr('disabled', 'disabled').addClass('disabled-link');
                }
            } else {
                alert('There was some error.');
            }
        });
        req.complete(function () {
            btn.removeAttr('disabled');
        })
    });
}(window.jQuery, window, document));
