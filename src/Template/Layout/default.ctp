<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    
    <?= $this->Html->script("jquery-3.1.1.min")?>
    <?= $this->Html->script("jquery.easy-autocomplete.min")?>


    <script>
      $(document).ready(function(){
        $.ajax({
                    type: "POST",
                    url: "<?=$this->Url->build(['controller'=>'pages','action'=>'gethint'])?>",
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
                    url: "<?=$this->Url->build(['controller'=>'pages','action'=>'getresult'])?>?word="+$("#search-box").val(),
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
            url: "<?=$this->Url->build(['controller'=>'pages','action'=>'getresult'])?>/"+val,
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
                url: "<?=$this->Url->build(['controller'=>'pages','action'=>'getcommentdefine'])?>/"+id+"/"+parent,
                success: function(data){
                    $(idhtml).html(data);
                    $(idhtml).show();
                    }
                });
            }
            else{
                $.ajax({
                type: "POST",
                url: "<?=$this->Url->build(['controller'=>'pages','action'=>'getcommentmean'])?>/"+id+"/"+parent,
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
                url = "<?=$this->Url->build(['controller'=>'commentdefinitions','action'=>'comment'])?>/"+id+"/"+a.value+"/"+parent;
                if(parent == 0)
                    url ="<?=$this->Url->build(['controller'=>'commentdefinitions','action'=>'comment'])?>/"+id+"/"+a.value;
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
                url = "<?=$this->Url->build(['controller'=>'commentmeans','action'=>'comment'])?>/"+id+"/"+a.value+"/"+parent;
                if(parent == 0)
                    url ="<?=$this->Url->build(['controller'=>'commentmeans','action'=>'comment'])?>/"+id+"/"+a.value;
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
    url = "<?=$this->Url->build(['controller'=>'pages','action'=>'warning'])?>/"+type+"/"+id
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
  
   url = "<?=$this->Url->build(['controller'=>'app','action'=>'addNotification',])?>/warning/"+typewarning+'/'+idwarning+'/'+encodeURIComponent($("#contentwarning").val())+'/'+encodeURIComponent($("#userwarning").val());
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
        url: "<?=$this->Url->build(['controller'=>'pages','action'=>'login',])?>",
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
                $("#msg-cd-login").html(`<div class="message error" onclick="this.classList.add('hidden');">Tài khoản hoặc mật khẩu bạn nhập không đúng.</div>`);
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
    // $(".cd-signin").click();
    var username = $("#signup-username").val();
    var namedisplay = $("#signup-fullname").val();
    var password = $("#signup-password").val();
    $.ajax({
        type: 'post',
        url: "<?=$this->Url->build(['controller'=>'pages','action'=>'signup',])?>" ,
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
                $("#msg-cd-signup").html(`<div class="message error" onclick="this.classList.add('hidden');">Có lỗi khi đãng ký.</div>`);
                $("#cd-btn-signup").html(` Đăng ký`);
                $("#cd-btn-signup").prop('disabled', false);
            }
            else if(data=="isset")
            {
                $("#msg-cd-signup").html(`<div class="message error" onclick="this.classList.add('hidden');">Người dùng đã tồn tại.</div>`);
                $("#cd-btn-signup").html(` Đăng ký`);
                $("#cd-btn-signup").prop('disabled', false);
            }
            else{
              $("#msg-cd-login").html(`<div class="message success" onclick="this.classList.add('hidden');">Đăng ký thành công, mời bạn đăng nhập.</div>`);
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
  function like_dislike(type,id,value,idhtml,top=0){
        
        if(type=='define'){
                //url = "likedefinitions/like/"+id+"/"+value;
                if(top==0)
                    url = "<?=$this->Url->build(['controller'=>'likedefinitions','action'=>'like',])?>/"+id+"/"+value;
                else url = "<?=$this->Url->build(['controller'=>'likedefinitions','action'=>'like',])?>/"+id+"/"+value+"/"+top;
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
                    url = "<?=$this->Url->build(['controller'=>'likemeans','action'=>'like',])?>/"+id+"/"+value;
                else url = "<?=$this->Url->build(['controller'=>'likemeans','action'=>'like',])?>/"+id+"/"+value+"/"+top;
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
    </script>
   
    <?= $this->Html->script('popup/modernizr')?>
    <?= $this->Html->script("popup/main")?>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('cake')?>
    <?= $this->Html->css('admin/css/font-awesome')?>
    
    
    <?= $this->Html->css('bootstrap.min')?>
    <?= $this->Html->css("popupreset")?>
    <?= $this->Html->css("popupstyle")?>
    <?= $this->Html->css('easy-autocomplete') ?>
    <?= $this->Html->css('layout') ?>

    
    
</head>
<body>
<!-- NAV-MENU -->
    <?php 
        $user = true;
        $loguser = $this->request->session()->read('Auth.User');
        //$url =$this->Url->build(['controller'=>'pages','action'=>'display']);
        if($loguser['isadmin']==0 || $loguser == null)
        {
            $user = false;
        }

     ?>
     <header class="w3-card-2">
      <nav class="navbar navbar-menu header">

          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menumobile" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <i class="fa fa-list-ul" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" style="margin-top: -2px;" href="#">
                <?=$this->Html->image('Logo-GTP.PNG',['alt'=>'logo','class'=>'logo','url'=>['controller'=>'pages','action'=>'display']]) ?> 
            </a>
          </div>

          <div class="collapse navbar-collapse" id="menumobile">
            <ul class="nav navbar-nav">
              <li class="dropdown mega-dropdown w3-btn">
                <?= $this->Html->link('Danh Sách Đóng Góp',['controller' => 'Pages', 'action' => 'contribute']);?>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="login-page">
                <?php
                  if($loguser!=null){
                  ?>
                    <li class="dropdown w3-btn">
                      <a href='#' >Xin chào, <?=$loguser['namedisplay']?> </a>
                    </li>
                    <?php
                      if($loguser['isadmin']){
                      ?>
                          <li class="dropdown w3-btn">
                            <?=$this->Html->link('Trang Quản Trị',['controller'=>'admin'])?>
                          </li>
                      <?php
                    }
                    ?>
                    <li class="dropdown w3-btn">
                      <?=$this->Html->link('Đăng xuất',['controller'=>'users','action'=>'logout'])?>
                    </li>
                  <?php
                  }else{
                    ?>
                    <li class="dropdown main-nav w3-btn">
                    <a class="cd-signin" href="#0">Đăng Nhập/ Đăng Ký</a>
                    </li>
                    <?php
                  }
                ?>
            </ul>

        </div><!-- /.navbar-collapse -->
        <!-- </div> --><!-- /.container-fluid -->
      </nav>
    </header>
    <!-- popup -->
    <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
    <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
      <ul class="cd-switcher">
        <li><a href="#0">Đăng Nhập</a></li>
        <li><a href="#0" id="tab-signup">Đăng Ký</a></li>
      </ul>

      <div id="cd-login"> <!-- log in form -->
        <form class="cd-form">
          <p class="fieldset" id="msg-cd-login">
              
          </p>
          <p class="fieldset">
            <label class="image-replace cd-email" for="signin-email">Tên Đăng Nhập</label>
            <input class="full-width has-padding has-border" id="signin-username" type="username" placeholder="Tên Đăng Nhập" name="signin-username">
            <span class="cd-error-message">Error message here!</span>
        </p>

          <p class="fieldset">
            <label class="image-replace cd-password" for="signin-password">Mật Khẩu</label>
            <input class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="Mật Khẩu" name="signin-password">
            <!-- <span class="cd-error-message">Error message here!</span> -->
          </p>

          <p class="fieldset">
            <input type="checkbox" id="remember-me" checked>
            <label for="remember-me">Nhớ Mật Khẩu</label>
          </p>

          <p class="fieldset">
            <button class="full-width" type="submit" id="cd-btn-login" onclick="login()">Đăng nhập</button>
          </p>
        </form>
        
        <p class="cd-form-bottom-message"><a href="#0">Quên mật khẩu</a></p>
        <!-- <a href="#0" class="cd-close-form">Close</a> -->
      </div> <!-- cd-login -->

      <div id="cd-signup"> <!-- sign up form -->
        <form class="cd-form" action="">
        <p class="fieldset" id="msg-cd-signup">
              
          </p>
          <p class="fieldset">
            <label class="image-replace cd-username" for="signup-username">Tên Đăng Nhập</label>
            <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Tên Đăng Nhập" >
          </p>
          <p class="fieldset">
            <label class="image-replace cd-username" for="signup-fullname">Tên Hiển Thị</label>
            <input class="full-width has-padding has-border" id="signup-fullname" type="text"  placeholder="Tên Hiển Thị">
            <!-- <span class="cd-error-message">Error message here!</span> -->
          </p>

          <p class="fieldset">
            <label class="image-replace cd-password" for="signup-password">Mật Khẩu</label>
            <input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Mật Khẩu">
            
            <!-- <span class="cd-error-message">Error message here!</span> -->
          </p>

<!--           <p class="fieldset">
            <input type="checkbox" id="accept-terms">
            <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
          </p> -->

          <p class="fieldset">
            <button class="full-width" type="submit" id="cd-btn-signup" onclick="signup()">Đăng ký</button>
            <!--<input class="full-width has-padding " type="submit" value="Đăng Ký">-->
          </p>
        </form>

        <!-- <a href="#0" class="cd-close-form">Close</a> -->
      </div> <!-- cd-signup -->

      <div id="cd-reset-password"> <!-- reset password form -->
        <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

        <form class="cd-form">
          <p class="fieldset">
            <label class="image-replace cd-email" for="reset-email">E-mail</label>
            <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
            <span class="cd-error-message">Error message here!</span>
          </p>

          <p class="fieldset">
            <input class="full-width has-padding" type="submit" value="Reset password">
          </p>
        </form>

        <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
      </div> <!-- cd-reset-password -->
      <a href="" class="cd-close-form">Close</a>
    </div> <!-- cd-user-modal-container -->
  </div> <!-- cd-user-modal -->
  <!-- popup -->

    <!-- AREA-TEXT -->
    <div id="mycontent">
        <div class="container-fluid">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <!-- FOOTER -->
    <footer>
        <div class="navbar nav-footer">
            <div class="container" style="margin: auto">

              <p class="navbar-text">© 2016 - Được phát triển bởi thuatnguchuyennganhCNTT
                   <a href="index.php" target="_blank" >Nhóm GTP</a>
              </p>

            </div>
        </div>
    </footer>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
  
</body>
</html>
