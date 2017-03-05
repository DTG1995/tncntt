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

    

    <?= $this->Html->css('bootstrap.min')?>


    <?= $this->Html->css('layout.css') ?>
   
    <?= $this->Html->script("jquery-3.1.1.min.js")?>
    <?= $this->Html->script("bootstrap.min.js")?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>
<body>
<!-- NAV-MENU -->
    <nav class="navbar navbar-menu header">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menumobile" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="glyphicon glyphicon-th"></span>
          </button>
          <a class="navbar-brand" style="margin-top: -2px;" href="#">
            <img alt="Brand" src="image/logo.png">
          </a>
        </div>

        <div class="collapse navbar-collapse" id="menumobile">
          <ul class="nav navbar-nav">

             <li class="dropdown mega-dropdown">
              <a href="#"  > Trang chủ </a> 
            </li>

          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="index.php" > Đăng ký </a>
            </li>
            <li class="dropdown">
              <a href="index.php" > Đăng nhập </a>
            </li>
          </ul>

        </div><!-- /.navbar-collapse -->
      <!-- </div> --><!-- /.container-fluid -->
    </nav>
    <!-- AREA-TEXT -->
    <div class="area-text">
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
