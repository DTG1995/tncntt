<?php
$loguser = $this->request->session()->read('Auth.User');
$url =$this->Url->build(['controller'=>'pages','action'=>'display']);
if($loguser['isadmin']==0 || $loguser == null)
{
    header("Location: ".$url);
    exit();
}
$session = $this->request->session();
$contributes = $session->read('contributes');
$count_contributes = $session->read('count_contributes');
$warnings = $session->read('warnings');
$count_warnings = $session->read('count_warnings');
// namespace App\View\Helper;
// App::uses('AuthComponent', 'Controller/Component');

// if($this->AuthUser->i())
// {
//      $url =$this->Url->build(['controller'=>'pages','action'=>'display']);
//     header ("Location: ".$url);
//     exit();
// }
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
<!DOCTYPE HTML>
<html>
<head>
<title>Welcome Administrator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<?= $this->Html->css('admin/css/bootstrap.min.css') ?>
<!-- Custom CSS -->
<?= $this->Html->css('admin/css/style.css')?>
<?= $this->Html->css('admin/css/morris.css')?>

<!-- Graph CSS -->
<?php echo $this->Html->css('admin/css/font-awesome')?>
<!-- jQuery -->
<?php echo $this->Html->script('jquery-2.1.4.min.js')?>

<!-- //jQuery -->
<!--<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>-->
<!-- lined-icons -->
<?php echo $this->Html->css('admin/css/icon-font.min.css')?>



</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->

<div class="left-content">
       <div class="mother-grid-inner">
             <!--header start here-->
                <div class="header-main">
                    <div class="logo-w3-agile">
                                <h1><a href="index.html">Pooled</a></h1>
                            </div>
                    <div class="w3layouts-left">
                            
                            <!--search-box-->
                                <div class="w3-search-box">
                                    <form action="#" method="post">
                                        <input type="text" placeholder="Search..." required=""> 
                                        <input type="submit" value="">                  
                                    </form>
                                </div><!--//end-search-box-->
                            <div class="clearfix"> </div>
                         </div>
                         <div class="w3layouts-right">
                            <div class="profile_details_left">
                                <ul class="nofitications-dropdown">
                                    <li class="dropdown head-dpdn" style="width:50%;">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge"><?=$count_contributes?></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="notification_header">
                                                    <h3>Có <?=$count_contributes?> đóng góp mới</h3>
                                                </div>
                                            </li>
                                            <?php foreach($contributes as $contribute)
                                            {
                                                $text = "
                                                        <div class='notification_desc'>
                                                            <p>".$contribute->content."</p>
                                                            <p><span>time</span></p>
                                                            </div>
                                                        <div class='clearfix'></div> ";
                                                $div = $this->Html->div(null, $text, array('id' => 'notescover'));

                                                // echo $this->Html->link(
                                                //     $div, 
                                                //     array('controller' => 'notes', 'action' => 'view', $viewnotes['Note']['id']),
                                                //     array('class' => 'light_blue', 'escape' => false)
                                                // );
                                            ?>
                                            <li>
                                                <?=$this->Html->link($div,['controller'=>'Notifications','action'=>'view',$contribute->id],['escape' => false]);?>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                            <li>
                                                <div class="notification_bottom">
                                                    <a href="#">See all messages</a>
                                                </div> 
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown head-dpdn" style="width:50%;">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span class="badge blue"><?=$count_warnings?></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="notification_header">
                                                    <h3>Có <?=$count_warnings?> cảnh báo mới</h3>
                                                </div>
                                            </li>
                                            <?php foreach($warnings as $warning)
                                            {?>
                                            <li>
                                                <?=$this->Html->link("<div class='user_img'><!-- <img src='images/in11.jpg' alt=''></div>
                                                <div class='notification_desc'>
                                                    <p>"+$warning->content+"</p>
                                                    <p><span>time</span></p>
                                                    </div>
                                                <div class='clearfix'></div> ",['controller'=>'Notifications','action'=>'view',$warning->id]);?>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                             <li>
                                                <div class="notification_bottom">
                                                    <a href="#">See all notifications</a>
                                                </div> 
                                            </li>
                                        </ul>
                                    </li>  
                                    <div class="clearfix"> </div>
                                </ul>
                                <div class="clearfix"> </div>
                            </div>
                            <!--notification menu end -->
                            
                            <div class="clearfix"> </div>               
                        </div>
                        <div class="profile_details w3l">       
                                <ul>
                                    <li class="dropdown profile_details_drop">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <div class="profile_img">   
                                                <div class="user-name">
                                                    <p>Administrator</p>
                                                    <span>
                                                            <?=$loguser['namedisplay']?>

                                                    </span>
                                                </div>
                                                <i class="fa fa-angle-down"></i>
                                                <i class="fa fa-angle-up"></i>
                                                <div class="clearfix"></div>    
                                            </div>  
                                        </a>
                                        <ul class="dropdown-menu drp-mnu">
                                            <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
                                            <li> <a href="#"><i class="fa fa-user"></i> Thông Tin</a> </li> 
                                             <li>
                                            <?=$this->Html->link("<i class='fa fa-home'></i><span>Trang Chủ</span><div class='clearfix'></div>",['controller'=>'pages','action'=>'display'],[ 'escape' => false]) ?>
                                             </li>
                                            <li>
                                            <?=$this->Html->link("<i class='fa fa-sign-out'></i><span>Đăng xuất</span><div class='clearfix'></div>",['controller'=>'users','action'=>'logout'],[ 'escape' => false]) ?>
                                             </li>
                                        </ul>
                                    </li>
                                </ul>
                                                     <div class="clearfix"> </div>  

                            </div>
                                                 <div class="clearfix"> </div>  

                </div>
<!--heder end here-->

<!-- CONTENT  -->
                 <?= $this->fetch('content') ?>
<!-- END CONTENT -->

<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
            <!--/sidebar-menu-->
                <div class="sidebar-menu">
                    <header class="logo1">
                        <a href="#" class="sidebar-icon">
                            <span class="fa fa-outdent"></span>
                        </a> 
                    </header>
                        <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
                                    <ul id="menu" >
              

                                        <li>
                                            <?=$this->Html->link("<i class='fa fa-file-word-o'></i><span>Words</span><div class='clearfix'></div>",['controller'=>'Words','action'=>'index'],[ 'escape' => false]) ?>
                                        </li>

                                        <li>
                                            <?=$this->Html->link("<i class='fa fa-skyatlas'></i><span>Categorys</span><div class='clearfix'></div>",['controller'=>'Categorys','action'=>'index'],[ 'escape' => false]) ?>
                                        </li>

                                        <li>
                                            <?=$this->Html->link("<i class='fa fa-american-sign-language-interpreting'></i>
                                            <span>Definitions</span><div class='clearfix'>
                                            </div>",['controller'=>'Definitions','action'=>'index'],[ 'escape' => false]) ?>
                                            
                                        </li>

                                        <li>
                                            <?=$this->Html->link("<i class='fa fa-meanpath'></i><span>Means</span><div class='clearfix'></div>",['controller'=>'Means','action'=>'index'],[ 'escape' => false]) ?>
                                            
                                        </li>
                                        
                                        <li>
                                            <?=$this->Html->link("<i class='fa fa-user' aria-hidden='true'></i>
                                            <span>Users</span><div class='clearfix'>
                                            </div>",['controller'=>'Users','action'=>'index'],[ 'escape' => false]) ?>
                                            
                                        </li>

                                    </ul>
                            </div>
                </div>
                            <div class="clearfix"></div>      
                            </div>
                            <script>
                            var toggle = true;
                                        
                            $(".sidebar-icon").click(function() {                
                              if (toggle)
                              {
                                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                                $("#menu span").css({"position":"absolute"});
                              }
                              else
                              {
                                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                                setTimeout(function() {
                                  $("#menu span").css({"position":"relative"});
                                }, 400);
                              }
                                            
                                            toggle = !toggle;
                                        });
                            </script>
<!--js -->
<?php echo $this->Html->script('jquery.nicescroll.js')?>
<?php echo $this->Html->script('scripts.js')?>
<!-- Bootstrap Core JavaScript -->
<?php echo $this->Html->script('bootstrap.min.js')?>
   <!-- /Bootstrap Core JavaScript -->     
<!-- morris JavaScript -->  
<?php echo $this->Html->script('raphael-min.js')?>
<?php echo $this->Html->script('morris.js')?>
<script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
       jQuery('.small-graph-box').hover(function() {
          jQuery(this).find('.box-button').fadeIn('fast');
       }, function() {
          jQuery(this).find('.box-button').fadeOut('fast');
       });
       jQuery('.small-graph-box .box-close').click(function() {
          jQuery(this).closest('.small-graph-box').fadeOut(200);
          return false;
       });
       
        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }
        
        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
            data: [
                {period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
                {period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
            ],
            lineColors:['#ff4a43','#a2d200','#22beef'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });
        
       
    });
    </script>
</body>
</html>