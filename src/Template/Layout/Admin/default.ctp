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

    <?=$this->Html->css('bootstrap.min')?>
    <?=$this->Html->css('bootstrap')?>
    <?=$this->Html->css('plugins/morris')?>
    <?=$this->Html->script('jquery.min')?>
    <?=$this->Html->script('bootstrap.min')?>

    <?=$this->Html->css('sb-admin')?>

</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuleft">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?= $this->Html->link('Dashboard',['controller'=>'admin','action'=>'index'],['class'=>'navbar-brand'],['escape'=>false])?>
                
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <!--Thông báo-->
                <li class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fa fa-bell"></i> <b class="caret"></b></button>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Thông báo<span class="label label-default">Thêm từ</span></a>
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
            <div class="collapse navbar-collapse" id="menuleft">
                <ul class="nav navbar-nav side-nav">
                    <!--Category-->
                    <li class="active">
                        <?=$this->Html->link('Category',['controller'=>'categorys','action'=>'index']) ?>
                        <ul >
                            <li class=<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='add') )?'activeselect':'' ?>>
                                <?= $this->Html->link('Add Category',['controller'=>'categorys','action'=>'add'])?>
                            </li>
                        </ul>
                    </li>
                    <!--Words-->
                    <li class="active">
                        <?=$this->Html->link('Words',['controller'=>'words','action'=>'index']) ?>
                        <ul >
                            <li class=<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='add') )?'activeselect':'' ?>>
                                <?= $this->Html->link('Add Word',['controller'=>'words','action'=>'add'])?>
                            </li>
                        </ul>
                    </li>
                        
                    <!--Mean-->
                    <li class="active">
                        <?=$this->Html->link('Means',['controller'=>'Means','action'=>'index']) ?>
                        <ul >
                            <li class=<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='add') )?'activeselect':'' ?>>
                                <?= $this->Html->link('Add Mean',['controller'=>'Means','action'=>'add'])?>
                            </li>
                        </ul>
                    </li>
                    
                    <!--Definitions-->
                    <li class="active">
                        <?=$this->Html->link('Definitions',['controller'=>'Definitions','action'=>'index']) ?>
                        <ul >
                            <li class=<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='add') )?'activeselect':'' ?>>
                                <?= $this->Html->link('Add Definitions',['controller'=>'Definitions','action'=>'add'])?>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>

        </nav>
    <div id="page-wrapper">
        <div class="container-fluid" style="min-height: 450px;">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <footer>
    </footer>
</div>
</body>
</html>
