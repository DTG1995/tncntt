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
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('admin/css/font-awesome')?>
    <?= $this->Html->css('bootstrap.min')?>
    <?= $this->Html->script("jquery-3.1.1.min.js")?>
    <?= $this->Html->script("bootstrap.min.js")?>
    <?= $this->Html->script("my-scripts.js")?>
    <?= $this->Html->css("popupreset")?>
    <?= $this->Html->css("popupstyle")?>
    <?= $this->HTml->script("modernizr")?>
    <?= $this->Html->css('layout') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
  
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
     <header>
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
              <li class="dropdown mega-dropdown">
                <?= $this->Html->link('Danh Sách Đóng Góp',['controller' => 'Pages', 'action' => 'contribute']);?>
              </li>
            </ul>
            
            <nav class="main-nav">
              <ul>
                <!-- inser more links here -->
                <li><a class="cd-signin" href="#0">Đăng Nhập</a></li>
              </ul>
            </nav>

        </div><!-- /.navbar-collapse -->
        <!-- </div> --><!-- /.container-fluid -->
      </nav>
    </header>
    <!-- popup -->
    <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
    <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
      <ul class="cd-switcher">
        <li><a href="#0">Đăng Nhập</a></li>
        <li><a href="#0">Đăng Ký</a></li>
      </ul>

      <div id="cd-login"> <!-- log in form -->
        <form class="cd-form" action="/pages/login"  >
          <p class="fieldset">
            <label class="image-replace cd-email" for="signin-email">Tên Đăng Nhập</label>
            <input class="full-width has-padding has-border" id="signin-username" type="username" placeholder="Tên Đăng Nhập" name="username">
<!--             <span class="cd-error-message">Error message here!</span>
 -->          </p>

          <p class="fieldset">
            <label class="image-replace cd-password" for="signin-password">Mật Khẩu</label>
            <input class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="Mật Khẩu" name="password">
            <!-- <span class="cd-error-message">Error message here!</span> -->
          </p>

          <p class="fieldset">
            <input type="checkbox" id="remember-me" checked>
            <label for="remember-me">Nhớ Mật Khẩu</label>
          </p>

          <p class="fieldset">
           <input class="full-width" type="submit" value="Đăng nhập"/>
          </p>
        </form>
        
        <p class="cd-form-bottom-message"><a href="#0">Quên mật khẩu</a></p>
        <!-- <a href="#0" class="cd-close-form">Close</a> -->
      </div> <!-- cd-login -->

      <div id="cd-signup"> <!-- sign up form -->
        <form class="cd-form" action="">
          <p class="fieldset">
            <label class="image-replace cd-username" for="signup-username">Tên Đăng Nhập</label>
            <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Tên Đăng Nhập">
            <!-- <span class="cd-error-message">Error message here!</span> -->
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
            <input class="full-width has-padding" type="submit" value="Đăng Ký">
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
      <a href="#0" class="cd-close-form">Close</a>
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
                   <a href="index.php" target="_blank" >Nhóm TPG</a>
              </p>

            </div>
        </div>
    </footer>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <?= $this->Html->script("main")?>
</body>
</html>
