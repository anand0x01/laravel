!function(a){var b=function(b,c){c="undefined"!=typeof c?c:{};var d=a.ajax({url:b,type:"POST",data:c,dataType:"json"});return d.fail(function(){alert("Network Error please refresh the page")}),d},c=function(b){b?a("#modConfBtn").removeAttr("disabled").removeClass("disabled-link"):a("#modConfBtn").attr("disabled","disabled").addClass("disabled-link"),a("#nav_ll_count").text(b)},d=function(b){a("#nav_ll_ul_main").html(b)},e=function(a,b,c,d){return'<li><div class="media"><a class="pull-left"href="#"><img width="64px" height="64px" class="media-object"src="'+d+'"alt=".media-object"></a><div class="media-body"><div class="clearfix"><h4 class="media-heading pull-left">'+a+'</h4><button userId="'+b+'" class="btn btn-link pull-right nav_ul_rmv_btn">Remove</button></div><ul class="list-unstyled"><li><strong>Email:</strong>'+c+"</li></ul></div></div><hr/></li>"},f=function(b){if(b.hasOwnProperty("users")&&a.isArray(b.users)&&b.users.length>0){for(var f="",g=0;g<b.users.length;++g){var h=b.users[g];f+=e(h.name,h.id,h.email,h.profilePic)}c(b.users.length),d(f)}else c(0),d("<strong>You haven't made any entry in your list</strong>")};if(a("#list_nav_modal").length){var g=a("#list_nav_modal");b(g.attr("furl")).done(function(a){f(a)})}}(window.jQuery,window,document);