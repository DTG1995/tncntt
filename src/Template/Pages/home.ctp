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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;


if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$this->assign('title','Trang chủ');
?>


    <script>
        $(document).ready(function(){
        $("#search-box").keyup(function(e){
            $("#result").html("");
            $("#txtresult").val("");
            $("#ratingmean").html("");
            if(e.keyCode == 13){
                $.ajax({
                    type: "POST",
                    url: "pages/getresult/"+$(this).val(),
                    data:'keyword='+$(this).val(),
                    success: function(data){
                        $("#suggesstion-box").hide();
                        $("#result").html(data);
                        $("#search-box").css("background","#FFF");
                 }
             });
            }else{   
                    $.ajax({
                    type: "POST",
                    url: "pages/gethint/"+$(this).val(),
                    data:'keyword='+$(this).val(),
                    beforeSend: function(){
                        $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat right");
                    },
                    success: function(data){
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#search-box").css("background","#FFF");
                    }
                    });
                }});
            });
    //To select word
    function selectWord(val) {
    
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
        $.ajax({
            type: "POST",
            url: "pages/getresult/"+val,
            data:'keyword='+val,
            success: function(data){
                // $("#result").html(data);
                // $("#result1").val(data);
                $("#search-box").css("background","#FFF");
            }
        });
    }
    function viewcomment(type,idhtml,id,parent){
        debugger;
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
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <?= $this->Html->script("like-dislike.js") ?>
    
<h1>Tra cứu thuật ngữ công nghệ thông tin </h1>
<div>
    <div class="container-fluid area_combobox">
    <!-- AREA-COMBOBOX -->
        <div class="">
            <div class="col-sm-3 col-xs-12">
                <div class="form-group">
                    <!--<select class="w3-select form-control" id="sel1">-->
                      <!--<option value="">Tất cả</option>-->
                        <?php
                            // foreach ($categorys as $category) {
                        ?>
                        <!--<option value=<?=$category->ID;?>> <?=$category->NAME;?> </option>-->
                        <?php
                            // }
                        ?>
                    <!--</select>-->
                  </div>
            </div>
            <div class="col-sm-8 col-xs-12">
                
            </div>
        </div>
    </div>
    <div class="area_text container-fluid"> 
    <!-- AREA_TEXT -->
      <div class="">
            <form>
                <div class="col-xs-12 col-sm-6 text_translate">
                    <input type="textFind" id="search-box"  name="fname" placeholder="Nhập từ cần tra...">
                </div>
                <div class="col-xs-12 col-sm-6">
                    <input readonly type="textseached" id="txtresult" name="fname" placeholder="Hiển thị nghĩa...">
                    <div class="rating" id="ratingmean">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div>
        <div class="row">
            <div id="suggesstion-box"></div>
        </div>
        <div class="row contents" id="result">
        </div>
    </div>
<script>
 $('#rating').likeDislike({
        reverseMode: false,
        disabledClass: 'disable',
        click: function (value, l, d, event) {
            var likes = $(this.element).find('.likes');
            var dislikes =  $(this.element).find('.dislikes');

            likes.text(parseInt(likes.text()) + l);
            dislikes.text(parseInt(dislikes.text()) + d);
        }
    });
</script>