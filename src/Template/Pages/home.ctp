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
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
        $("#search-box").keyup(function(e){
            $("#result").html("");
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
            $("#result").html(data);
            $("#search-box").css("background","#FFF");
        }
    });
    }
    </script>

    <div class="area_combobox">
    <!-- AREA-COMBOBOX -->
        <div class="row">
            <div class="col-sm-3 col-xs-12">
                <div class="form-group">
                    <select class='form-control '  id="sel1">
                    <option value="">Tat ca</option>
                    <?php
                        foreach ($categorys as $category) {
                    ?>
                    <option value=<?=$category->ID;?>> <?=$category->NAME;?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-8 col-xs-12">
                
            </div>
        </div>
        <div class="form-group">
            <div class="form-group">
                <div class="frmSearch col-lg-6">
                    <textarea id="search-box" placeholder="Word ?" /></textarea>
                </div>
                <div class="col-lg-6">
                    <textarea></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="suggesstion-box"></div>
        </div>
        <div class="row contents" id="result">
        </div>
    </div>
