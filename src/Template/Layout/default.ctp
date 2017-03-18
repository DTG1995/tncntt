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
                <?=$this->Html->image('Logo-GTP.PNG',['alt'=>'logo','class'=>'logo']) ?> 
            </a>
          </div>

          <div class="collapse navbar-collapse" id="menumobile">
            <ul class="nav navbar-nav">
              <li class="dropdown mega-dropdown">
                <a href="#"  > Danh Sách Đóng Góp </a> 
              </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <?php
                  if($loguser!=null){
                    ?>
                    <li class="dropdown">
                      <a href='#' >Xin chào, <?=$loguser['namedisplay']?> </a>
                    </li>
                    <li class="dropdown">
                      <?= $this->Html->link('Đăng xuất',['controller'=>'users','action'=>'logout'])?>
                    </li>
                <?php
                  }else{
                    ?>
                    <li class="dropdown">
                      <?= $this->Html->link('Đăng ký',['controller'=>'users','action'=>'adduser'])?>
                    </li>
                    <li class="dropdown">
                      <a href='login' > Đăng nhập </a>
                    </li>
                    <?php
                  }
                ?>
            </ul>

          </div><!-- /.navbar-collapse -->
        <!-- </div> --><!-- /.container-fluid -->
      </nav>
    </header>
    <!-- AREA-TEXT -->
    <div id="mycontent">
        <?= $this->Flash->render() ?>
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
</body>
</html>
