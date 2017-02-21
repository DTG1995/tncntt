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
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title><?= $this->fetch('title') ?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?=$this->css('bootstrap.min');?>
</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" target="_blank" href="../../index.php">E-shop</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <!--Thông báo-->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">Đơn Hàng<span class="label label-default">Đặt hàng</span></a>
                    </li>
                    <li>
                        <a href="#">Đơn hàng<span class="label label-primary">Sửa hàng</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
                    </li>
                </ul>
            </li>
            <!--Thông tin cá nhân-->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>(Admin) <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="admin.php"><i class="fa fa-fw fa-user"></i>Cá nhân</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="admin.php?id=9"><i class="fa fa-fw fa-power-off"></i>Đăng xuất</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="#"><i class="fa fa-fw fa-dashboard"></i> Hàng hóa</a>
                </li>
                <!--Sản Phẩm-->
                <li>
                    <a href="admin.php?id=1">  <i class="fa fa-fw fa-file" style="margin-left: 10%;"></i> Loại Mặt Hàng</a>
                </li>
                <li>
                    <a href="admin.php?id=2">  <i class="fa fa-fw fa-file" style="margin-left: 10%;"></i> Hãng Sản Xuất</a>
                </li>
                <li>
                    <a href="admin.php?id=3">  <i class="fa fa-fw fa-file" style="margin-left: 10%;"></i> Sản Phẩm</a>
                </li>

                <!--Hóa đơn-->
                <li class="active">
                    <a href="#"><i class="fa fa-fw fa-dashboard"  ></i> Hóa đơn</a>
                </li>
                <li>
                    <a href="admin.php?id=4">  <i class="fa fa-fw fa-file" style="margin-left: 10%;"></i> Hóa đơn</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#chitiet"><i class="fa fa-fw fa-arrows-v"></i> Chi Tiết Hóa Đơn <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="chitiet" class="collapse">
                        <li>
                            <a href="admin.php?id=5.1">Đã Thanh Toán</a>
                        </li>
                        <li>
                            <a href="admin.php?id=5.2">Chưa Thanh Toán</a>
                        </li>
                    </ul>
                </li>
                <!--Thành viên -->
                <li class="active">
                    <a href="#"><i class="fa fa-fw fa-dashboard"></i> Thành Viên</a>
                </li>
                <li>
                    <a href="admin.php?id=6"><i class="fa fa-fw fa-file" style="margin-left: 10%;"></i> Thành viên</a>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-fw fa-dashboard"></i> Cá nhân</a>
                </li>
                <li>
                    <a href="admin.php" style="margin-left: 10%;"><i class="fa fa-fw fa-file"></i> Thông tin cá nhân</a>
                </li>
                <li>
                    <a href="admin.php?id=9"><i class="fa fa-fw fa-file" style="margin-left: 10%;"></i> Đăng xuất</a>
                </li>
            </ul>

        </div>

    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">

        </div>
        <div class="row">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
