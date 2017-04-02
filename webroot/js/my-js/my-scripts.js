$(document).ready(function(){
        $.ajax({
                    type: "POST",
                    url: "pages/gethint",
                    data:'keyword='+$(this).val(),
                    success: function(data){
                        var availableTags =data.substring(0,data.length-1).split('@');
                        var options = {
	
                                data: availableTags,
                                list: {	
                                    match: {
                                        enabled: true
                                    },
                                    onClickEvent: function() {
                                        getresult();
                                    },
                                    onChooseEvent:function(){
                                       getresult();
                                    }
                                },

                                theme: "square"
                            };
                        $("#search-box").easyAutocomplete(options);
                    }
                    });
            });

    function getresult(){
        $("#result").html("");
            $("#txtresult").val("");
            $var = $("input[type=textFind]").height() + 43;
            $("textarea").animate({
                height: $var
            });
            $("#ratingmean").html("");
                var str = $("#search-box").val();
                $.ajax({
                    type: "POST",
                    url: "pages/getresult?word="+$("#search-box").val(),
                    success: function(data){
                        $("#suggesstion-box").show();
                        $("#result").html(data);
                        $("#search-box").css("background","#FFF");
                 }
             });
    }
    //To select word
    function selectWord(val) {
        
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
        $.ajax({
            type: "POST",
            url: "pages/getresult/"+val,
            data:'keyword='+val,
            success: function(data){
                $("#suggesstion-box").hide();
                $("#result").html(data);
                $("#search-box").css("background","#FFF");
            }
        });
    }

    function viewcomment(type,idhtml,id,parent){
        if($(idhtml).text()!="")
        {
            $(idhtml).text("");
            $(idhtml).hide();
        }
        else{
            // $('.commentcontent').hide();
            if(type=='define')
            {
                $.ajax({
                type: "POST",
                url: "pages/getcommentdefine/"+id+"/"+parent,
                success: function(data){
                    $(idhtml).html(data);
                    $(idhtml).show();
                    }
                });
            }
            else{
                $.ajax({
                type: "POST",
                url: "pages/getcommentmean/"+id+"/"+parent,
                success: function(data){
                    $(idhtml).html(data);
                    $(idhtml).show();
                    }
                });
            }
        }
    }
    function addcomment(type,idhtml,id,parent,a,e){
        
        if(e.keyCode==13)
        {
            $(idhtml).html("");
            if(type=='define'){
                url = "commentdefinitions/comment/"+id+"/"+a.value+"/"+parent;
                if(parent == 0)
                    url ="commentdefinitions/comment/"+id+"/"+a.value;
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function(data){
                        if(data!=""){
                        $(idhtml).html(data);
                        $(idhtml).show();
                        }else{
                            login();
                        }
                    }
                    });
            }
            else{
                url = "commentmeans/comment/"+id+"/"+a.value+"/"+parent;
                if(parent == 0)
                    url ="commentmeans/comment/"+id+"/"+a.value;
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function(data){
                        if(data!=""){
                        $(idhtml).html(data);
                        $(idhtml).show();
                        }else{
                            login();
                        }
                    }
                    });
            }
        }
    }
    

function changecontribute(type,url,id,value){
    if(type=='define'){
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function(data){
                        idhtml = "#define"+id;
                        $(idhtml).html(data);
                        }
                    });
            }
            else{
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function(data){
                        idhtml = "#mean"+id;
                        $(idhtml).html(data);
                        }
                    });
            }
}
    //back to top
        function toBottom()
        {
            window.scrollTo(0,document.body.scrollHeight);
        } 

var idwarning=-1;
var typewarning='';
function warning(type,id){
    idwarning = id;
    typewarning=type;
    url ="pages/warning/"+type+"/"+id
    $.ajax({
            type: "POST",
            url: url,
            beforeSend: function(){
                $("#modal-content").html('');
                $("#modal-content").css("background","#FFF url('LoaderIcon.gif') no-repeat center");
            },
            success: function(data){
                $("#modal-content").html(data);
                $("#modal-content").css("background","#FFF");
        }
    });
}
function addwarning(){
   url = 'app/addNotification/warning/'+typewarning+'/'+idwarning+'/'+encodeURIComponent($("#contentwarning").val())+'/'+encodeURIComponent($("#userwarning").val());
    $.ajax({
        url: url,
        success: function(data){
            alert('Cảm ơn bạn đã giúp chúng tôi phát hiên lỗi')
        }
    });
}

    function login(){
      //$(".cd-close-form").click();
      $(".cd-signin").click();
    var username = $("#signin-username").val();
    var password = $("#signin-password").val();
    return $.ajax({
        type: 'POST',
        url: 'pages/login',
        data: { 
            'username': username, 
            'password': password // <-- the $ sign in the parameter name seems unusual, I would avoid it
        },
        beforeSend: function(){
            $("#cd-btn-login").prop('disabled', true);
            $("#cd-btn-login").html(` Đăng nhập <i class="fa fa-refresh fa-spin fa-fw" aria-hidden="true"></i>`);
        },
        success: function(data){
            if(data=="false")
            {
                $("#msg-cd-login").html(`<div class="message error" onclick="this.classList.add('hidden');">Your username or password is incorrect.</div>`);
                $("#cd-btn-login").html(` Đăng nhập`);
                $("#cd-btn-login").prop('disabled', false);
            }
            else{
              $("#login-page").html(data);
              $(".cd-close-form").click();
            }
        }
    });
}
function signup(){
    debugger;
    // $(".cd-signin").click();
    var username = $("#signup-username").val();
    var namedisplay = $("#signup-fullname").val();
    var password = $("#signup-password").val();
    $.ajax({
        type: 'POST',
        url: 'pages/signup',
        data: { 
            'username': username, 
            'password': password,
            'namedisplay':namedisplay // <-- the $ sign in the parameter name seems unusual, I would avoid it
        },
        beforeSend: function(){
            $("#cd-btn-signup").prop('disabled', true);
            $("#cd-btn-signup").html(` Đăng nhập <i class="fa fa-refresh fa-spin fa-fw" aria-hidden="true"></i>`);
        },
        success: function(data){
            if(data=="false")
            {
                $("#msg-cd-signup").html(`<div class="message error" onclick="this.classList.add('hidden');">Your username or password is incorrect.</div>`);
                $("#cd-btn-signup").html(` Đăng nhập`);
                $("#cd-btn-signup").prop('disabled', false);
            }
            else{
             login();
            }
        }
    });
}
  function like_dislike(type,id,value,idhtml,top=0){
        
        if(type=='define'){
                url = "likedefinitions/like/"+id+"/"+value;
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function(data){
                        if(data!="")
                          $(idhtml).html(data);
                        else
                          login();
                        }
                    });
            }
            else{
                if(top==0)
                    url = "likemeans/like/"+id+"/"+value;
                else url = "likemeans/like/"+id+"/"+value+"/"+top;
                $.ajax({
                    type: "script",
                    url: url,
                    success: function(data){
                       if(data!="")
                          $(idhtml).html(data);
                        else
                          login();
                        }
                    });
            }
    }

    function getLineCount() {
        var lines = $('textarea').val().length;
        var width = $('textarea').width();
        var lg= lines * 7.2;
        var kq = 0;
        while(lg + width >= width){
            kq++;
            lg = lg - width;
        }
        console.log(kq);
        return kq;
    }