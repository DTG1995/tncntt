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
                }).then(
                function(){
                $("#search-box").keyup(function(e){
                    $(".easy-autocomplete-container").show();
                    if(e.keyCode ==13){
                        getresult();
                        $(".easy-autocomplete-container").hide();
                    }
                });
                $("#search-box").focus();
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
                    beforeSend: function(){
                        $("#myModalLoader").modal({backdrop: 'static', keyboard: false});
                    },
                    success: function(data){
                        $("#suggesstion-box").show();
                        $("#result").html(data);
                        $("#search-box").css("background","#FFF");
                        $("#myModalLoader").modal('hide');
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

    function login(click=true){
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
                if(click)
                    $("#msg-cd-login").html(`
                    <div class="alert alert-danger" onclick="this.classList.add('hidden');">
                        <strong>Lỗi!</strong> Tên đăng nhập hoặc mật khẩu không đúng.
                    </div>`);
                else click = true;
                
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
                          login(false);
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
                          login(false);
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
    function signup(){
    // $(".cd-signin").click();
    var username = $("#signup-username").val();
    var namedisplay = $("#signup-fullname").val();
    var password = $("#signup-password").val();
    $.ajax({
        type: 'post',
        url: "pages/signup" ,
        data: { 
            'username': username, 
            'password': password,
            'namedisplay':namedisplay // <-- the $ sign in the parameter name seems unusual, I would avoid it
        },
        beforeSend: function(){
            $("#cd-btn-signup").prop('disabled', true);
            $("#cd-btn-signup").html(` Đăng ký <i class="fa fa-refresh fa-spin fa-fw" aria-hidden="true"></i>`);
        },
        success: function(data){
            if(data=="false")
            {
                $("#msg-cd-signup").html(` <div class="alert alert-danger" onclick="this.classList.add('hidden');">
                        <strong>Lỗi!</strong> Có lỗi khi đãng ký.
                    </div>`);
                $("#cd-btn-signup").html(` Đăng ký`);
                $("#cd-btn-signup").prop('disabled', false);
            }
            else if(data=="isset")
            {
                $("#msg-cd-signup").html( `<div class="alert alert-danger" onclick="this.classList.add('hidden');">
                        <strong>Lỗi!</strong> Người dùng đã tồn tại.
                    </div>`);
                $("#cd-btn-signup").html(` Đăng ký`);
                $("#cd-btn-signup").prop('disabled', false);
            }
            else{
              $("#msg-cd-login").html(`<div  class="alert alert-success" onclick="this.classList.add('hidden');">
                        <strong>Hoàn tất!</strong> Đăng ký thành công, mời bạn đăng nhập..
                    </div>`);
              $("#cd-btn-signup").html(` Đăng ký`);
              $("#cd-btn-signup").prop('disabled', false);
              login(false);
            }
        },
        error:function(error){
          alert(error);
        }
    });
}