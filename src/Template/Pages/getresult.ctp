<?php 
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
                case -1:
                    $liked="disliked";
                    break;
                case 1:
                    $liked="liked";
                    break;
            }
            
        }
?>
<script>
 var data = "<?=$word['means'][0]->mean; ?>";
 var likemean = <?=$like?> ;
 var dislikemean = <?=$dislike?>;
 var comment = <?=$comment?>;
 var ratingmean = `
                    <div id="like_dislikemean<?=$mean->id?>" style="float:left;">
                        <a class="like" onclick="return like_dislike('mean',<?=$mean->id?>,1,'#like_dislikemean<?=$mean->id?>',1);">
                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Thích&nbsp<span >`+likemean+`</span>
                        </a>
                        <span> &nbsp </span>
                        <a class="dislike" onclick="return like_dislike('mean',<?=$mean->id?>,-1,'#like_dislikemean<?=$mean->id?>',1);"> 
                            <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Không thích&nbsp<span>`+dislikemean+`</span>
                        </a>
                        <span> &nbsp </span>
                    </div>
                    <a class="comment" onclick="return viewcomment('mean','#mean<?=$mean->id?>',<?=$mean->id?>,0);">
                        <i class="fa fa-comment-o" aria-hidden="true"></i> Bình luận&nbsp<span id="mean<?=$mean->id?>_comment">`+comment+`</span>
                    </a>
                    <div class="commentcontent" id ="mean<?=$mean->id?>"></div>`;
                        
$("#txtresult").val(data);
$("#ratingmean").html(ratingmean);
$("#ratingmean").addClass("<?=$liked?>");
</script>
<?php
    }
?>
<div class="container-fluid area_text2">
    <div class="">
        <div class="col-sm-6 text-left ">
            <h1>Định nghĩa:</h1>
            <ul class="defines">
            <?php 
                if(count($defines)>0){
                    foreach($defines as $catedefines)
                    {
                        ?>
                        <li> 
                            <h4 class="catgory"><?=$catedefines[1];?></h4>
                        <?php
                        foreach($catedefines[2] as $define)
                        {
                            $liked="";
                            if(count($define->likedefinitions)>0)
                                switch($define->likedefinitions[0]->mylike){
                                    case -1:
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
                                            <a class="dislike" onclick="return like_dislike('define',<?=$define->id?>,-1,'#like_dislikedefine<?=$define->id?>');"> 
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Không thích&nbsp<span><?php echo count($define->likedefinitions)>0?$define->likedefinitions[0]->dislike:0;?></span>
                                            </a>
                                            <span> &nbsp </span>
                                        </div>
                                        <a class="comment" onclick="return viewcomment('define','#define<?=$define->id?>',<?=$define->id?>,0);">
                                            <i class="fa fa-comment-o" aria-hidden="true"></i> Bình luận
                                        </a>
                                        <span class="comment" id="define<?=$define->id?>_comment"><?php echo count($define->commentdefinitions)>0?$define->commentdefinitions[0]->count:0 ?></span>
                                        <hr>
                                        <div class="commentcontent" id ="define<?=$define->id?>"></div>
                                    </div>
                                </li>
                            <?php
                        }
                        echo "</li>";
                    }
                    echo $this->Html->link('Đóng góp thêm',['controller'=>'definitions','action'=>'contribute',$word->id,$word->word],['class'=>'btn btn-warning']);
                }
                else echo "<p>Từ chưa có định nghĩa, ".$this->Html->link('đóng góp',['controller'=>'definitions','action'=>'contribute',$word->id,$word->word]);
            ?>
            </ul>
        </div>
        <div class="col-sm-6 text-left">
            <h1>Các nghĩa khác của từ:</h1>
            <ul class="means">
            <?php
            if(count($means)>0){
                foreach($means as $catemeans)
                {
                    ?>
                    <li> 
                        <h4 class="catgory"><?=$catemeans[1];?></h4>
                    <?php
                    for($i=0;$i<count($catemeans[2]);$i++)
                    {
                        $mean = $catemeans[2][$i];
                        $liked="";
                        if(count($mean->likemeans)>0)
                            switch($mean->likemeans[0]->mylike){
                                case -1:
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
                                            <a class="dislike" onclick="return like_dislike('mean',<?=$mean->id?>,-1,'#like_dislikemean<?=$mean->id?>');"> 
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Không thích&nbsp<span ><?php echo count($mean->likemeans)>0?$mean->likemeans[0]->dislike:0;?></span>
                                            </a>
                                            <span> &nbsp</span>
                                        </div>
                                        <a class="comment" onclick="return viewcomment('mean','#mean<?=$mean->id?>',<?=$mean->id?>,0);">
                                            <i class="fa fa-comment-o" aria-hidden="true"></i> Bình luận
                                        </a>
                                    <span class="comment" id="mean<?=$mean->id?>_comment"><?php echo count($mean->commentmeans)>0?$mean->commentmeans[0]->count:0 ?></span>
                                    <hr>
                                    <div class="commentcontent" id ="mean<?=$mean->id?>"></div>
                                </div>
                                </div>
                            </li>
                        <?php
                    }
                    echo "</li>";
                }
                echo $this->Html->link('Đóng góp thêm',['controller'=>'means','action'=>'contribute',$word->id,$word->word],['class'=>'btn btn-warning']);
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
    <h1> Xin lỗi, từ bạn tra chưa có trong dữ liệu. Bạn có muốn <a>đóng góp</a></h1>
    <?php
}
?>