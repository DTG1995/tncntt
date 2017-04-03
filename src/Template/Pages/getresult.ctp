<?php 
    $loguser = $this->request->session()->read('Auth.User');
    $this->layout = false;


if($word!=null)
{
    $like=0;
    $dislike=0;
    if(count($word->means)>0){
        $mean = $word->means[0];
        $comment=count($mean->commentmeans)>0? $mean->commentmeans[0]->count:0;
        $liked = "";
        if(count($mean->likemeans)>0){
            $like = $mean->likemeans[0]->like;
            $dislike = $mean->likemeans[0]->dislike;
            switch($mean->likemeans[0]->mylike){
                case 0:
                    $liked="disliked";
                    break;
                case 1:
                    $liked="liked";
                    break;
            }
            
        }


?>
<script>
 var data = `<?=$word['means'][0]->mean; ?>`;
 var likemean = <?=$like?> ;
 var dislikemean = <?=$dislike?>;
 var comment = <?=$comment?>;
 var ratingmean = `
                    <div id="like_dislikemean<?=$mean->id?>" style="float:left;">
                        <a class="like" onclick="return like_dislike('mean',<?=$mean->id?>,1,'#like_dislikemean<?=$mean->id?>',1);">
                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Thích&nbsp<span >`+likemean+`</span>
                        </a>
                        <span> &nbsp </span>
                        <a class="dislike" onclick="return like_dislike('mean',<?=$mean->id?>,0,'#like_dislikemean<?=$mean->id?>',1);"> 
                            <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Không thích&nbsp<span>`+dislikemean+`</span>
                        </a>
                        <span> &nbsp </span>
                    </div>
                    <a class="comment" onclick="return viewcomment('mean','#mean<?=$mean->id?>',<?=$mean->id?>,0);">
                        <i class="fa fa-comment-o" aria-hidden="true"></i> Bình luận&nbsp<span id="mean<?=$mean->id?>_comment">`+comment+`</span>
                    </a>
                    <a class="warning" data-toggle="modal" data-target="#modalwarning" onclick="warning('mean',<?=$mean->id?>)"  style="color:red;float:right;">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Báo cáo
                    </a>
                    <div class="commentcontent" id ="mean<?=$mean->id?>"></div>`;
                        
$("#txtresult").val(data);

var lg = $('textarea').val().length * 7.2;
var width = $('textarea').width();
var textFind = $('input[type=textFind]').val();
    console.log(textFind);
var kq = 0;
while(lg + width >= width){
    kq++;
    lg = lg - width;
}
$var = 25;
if(kq>1){
    $var = $var * kq ;
        console.log($var);
    $("textarea").animate({
        height: $var
    });
}




$("#ratingmean").html(ratingmean);
$("#ratingmean").addClass("<?=$liked?>");
</script>
<?php
    }
    if($loguser==0){
?>

<?php 
    }
 ?>
<div class="container-fluid area_text2">
    <div class="">
        <div class="col-sm-6 text-left ">
            <h2>Định nghĩa:</h2>
            <ul class="defines w3-ul">
            <?php 
                if(count($defines)>0){
                    foreach($defines as $catedefines)
                    {
                        ?>
                        <li> 
                            <h3 class="catgory"><?=$catedefines[1];?></h3>
                        <?php
                        foreach($catedefines[2] as $define)
                        {
                            $liked="";
                            if(count($define->likedefinitions)>0)
                                switch($define->likedefinitions[0]->mylike){
                                    case 0:
                                        $liked="disliked";
                                        break;
                                    case 1:
                                        $liked="liked";
                                        break;
                                }
                            ?>
                                <li>
                                    <p><?=$define->define;?></p>
                                    <div class="rating <?=$liked?>" id="ratingdefinition<?=$define->id?>">
                                        <div id="like_dislikedefine<?=$define->id?>" style="float:left;">
                                            <a class="like" onclick="return like_dislike('define',<?=$define->id?>,1,'#like_dislikedefine<?=$define->id?>');">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Thích&nbsp<span><?php echo count($define->likedefinitions)>0?$define->likedefinitions[0]->like:0;?></span>
                                            </a>
                                            <span> &nbsp </span>
                                            <a class="dislike" onclick="return like_dislike('define',<?=$define->id?>,0,'#like_dislikedefine<?=$define->id?>');"> 
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Không thích&nbsp<span><?php echo count($define->likedefinitions)>0?$define->likedefinitions[0]->dislike:0;?></span>
                                            </a>
                                            <span> &nbsp </span>
                                        </div>
                                        <a class="comment" onclick="return viewcomment('define','#define<?=$define->id?>',<?=$define->id?>,0);">
                                            <i class="fa fa-comment-o" aria-hidden="true"></i> Bình luận
                                            <span class="comment" id="define<?=$define->id?>_comment"><?php echo count($define->commentdefinitions)>0?$define->commentdefinitions[0]->count:0 ?></span>
                                        </a>
                                        <a class="warning" data-toggle="modal" data-target="#modalwarning" onclick="warning('define',<?=$define->id?>)"  style="color:red;float:right;">
                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Báo cáo
                                        </a>
                                        <div class="commentcontent" id ="define<?=$define->id?>"></div>
                                    </div>
                                </li>
                            <?php
                        }
                        echo "</li>";
                    }
                    echo $this->Html->link('Đóng góp thêm',['controller'=>'definitions','action'=>'contribute',$word->id,$word->word],['class'=>'btn btn-default']);
                }
                else echo "<p>Từ chưa có định nghĩa, ".$this->Html->link('đóng góp',['controller'=>'definitions','action'=>'contribute',$word->id,$word->word]);
            ?>
            </ul>
        </div>
        <div class="col-sm-6 text-left">
            <h2>Các nghĩa khác của từ:</h2>
            <ul class="means w3-ul">
            <?php
            if(count($means)>0){
                foreach($means as $catemeans)
                {
                    ?>
                    <li> 
                        <h3 class="catgory"><?=$catemeans[1];?></h3>
                    <?php
                    for($i=0;$i<count($catemeans[2]);$i++)
                    {
                        $mean = $catemeans[2][$i];
                        $liked="";
                        if(count($mean->likemeans)>0)
                            switch($mean->likemeans[0]->mylike){
                                case 0:
                                    $liked="disliked";
                                    break;
                                case 1:
                                    $liked="liked";
                                    break;
                            }
                        ?>
                            <li> 
                                <div class="mean">
                                    <p><?=$mean->mean;?></p>
                                    <div class="rating <?=$liked?>" id="ratingmean<?=$mean->id?>">
                                        <div id="like_dislikemean<?=$mean->id?>" style="float:left;">
                                            <a class="like " onclick="return like_dislike('mean',<?=$mean->id?>,1,'#like_dislikemean<?=$mean->id?>');">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Thích&nbsp<span><?php echo count($mean->likemeans)>0?$mean->likemeans[0]->like:0;?></span>
                                            </a>
                                            <span> &nbsp </span>
                                            <a class="dislike" onclick="return like_dislike('mean',<?=$mean->id?>,0,'#like_dislikemean<?=$mean->id?>');"> 
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Không thích&nbsp<span ><?php echo count($mean->likemeans)>0?$mean->likemeans[0]->dislike:0;?></span>
                                            </a>
                                            <span> &nbsp</span>
                                        </div>
                                        <a class="comment" onclick="return viewcomment('mean','#mean<?=$mean->id?>',<?=$mean->id?>,0);">
                                            <i class="fa fa-comment-o" aria-hidden="true"></i> Bình luận
                                            <span class="comment" id="mean<?=$mean->id?>_comment"><?php echo count($mean->commentmeans)>0?$mean->commentmeans[0]->count:0 ?></span>
                                        </a>
                                        <a class="warning" data-toggle="modal" data-target="#modalwarning" onclick="warning('mean',<?=$mean->id?>)"  style="color:red;float:right;">
                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Báo cáo
                                        </a>
                                    <div class="commentcontent" id ="mean<?=$mean->id?>"></div>
                                </div>
                                </div>
                            </li>
                        <?php
                    }
                    echo "</li>";
                }
                echo $this->Html->link('Đóng góp thêm',['controller'=>'means','action'=>'contribute',$word->id,$word->word],['class'=>'btn btn-default']);
            }
            else  echo "<p>Từ chưa có định nghĩa, ".$this->Html->link('đóng góp',['controller'=>'means','action'=>'contribute',$word->id,$word->word]);
            ?>
            </ul>
        </div>
    </div>
</div>
<?php
} else
{
    ?>
    <h1> Xin lỗi, từ bạn tra chưa có trong dữ liệu. Bạn có muốn <?= $this->Html->link("Đóng góp",['controller'=>'words','action'=>'addwordmean',$strword]) ?> từ <q><?=$strword?></q>.</h1>
    <?php
}
?>
<?php 
    $loguser = $this->request->session()->read('Auth.User');
?>
<div class="modal fade" id="modalwarning" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Báo cáo</h4>
        </div>
        <div class="modal-body" id="modal-content">
          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" onclick="addwarning()"  data-dismiss="modal">Báo Cáo</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
      
    </div>
  </div>
  