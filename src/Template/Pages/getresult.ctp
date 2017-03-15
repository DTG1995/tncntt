<?php 
    $this->layout = false;
if($word!=null)
{
    $like=0;
    $dislike=0;
    $mean = $word->means[0];
    $comment=count($mean->commentmeans)>0? $mean->commentmeans[0]->count:0;
    if(count($mean->likemeans)>0){
        $like = $mean->likemeans[0]->like;
        $dislike = $mean->likemeans[0]->dislike;
        
    }

?>
<script>
 var data = "<?=$word['means'][0]->mean; ?>";
 var likemean = <?=$like?> ;
 var dislikemean = <?=$dislike?>;
 var comment = <?=$comment?>;
 var ratingmean = `<a class="like ">
                            <span class="glyphicon glyphicon-thumbs-up"></span> Like
                        </a>
                        <span class="likes">`+likemean+`</span>
                        <a class="dislike"> 
                            <span class="glyphicon glyphicon-thumbs-down"></span> Dislike
                        </a>
                        <span class="dislikes" >`+dislikemean+`</span>
                        <a class="comment" onclick="return viewcomment('mean','#mean<?=$mean->id?>',<?=$mean->id?>,0);">
                                <span class="glyphicon glyphicon-comment"></span> Bình luận
                            </a>
                            <span class="comment" id="mean<?=$mean->id?>_comment">`+comment+`</span>
                        <div class="commentcontent" id ="mean<?=$mean->id?>"></div>`;
                        
$("#txtresult").val(data);
$("#ratingmean").html(ratingmean);

</script>

<div class="container-fluid area_text2">
    <div class="">
        <div class="col-sm-6 text-left w3-card-2">
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
                            ?>
                                <li>
                                    <p><?=$define->define;?></p>
                                    <div class="rating" id="rating">
                                        <a class="like ">
                                            <span class="glyphicon glyphicon-thumbs-up"></span> Thích
                                        </a>
                                        <span class="likes"><?php echo count($define->likedefinitions)>0?$define->likedefinitions[0]->like:0;?></span>
                                        <span> &nbsp </span>
                                        <a class="dislike"> 
                                            <span class="glyphicon glyphicon-thumbs-down"></span> Không thích
                                        </a>
                                        <span class="dislikes" ><?php echo count($define->likedefinitions)>0?$define->likedefinitions[0]->dislike:0;?></span>
                                        <span> &nbsp&nbsp </span>
                                        <a class="comment" onclick="return viewcomment('define','#define<?=$define->id?>',<?=$define->id?>,0);">
                                            <span class="glyphicon glyphicon-comment"></span> Bình luận
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
                }
                else echo "<p>Từ chưa có định nghĩa, ".$this->Html->link('đóng góp');
            ?>
            </ul>
        </div>
        <div class="col-sm-6 text-left w3-card-2">
            <h1>Các nghĩa khác của từ:</h1>
            <ul class="means">
            <?php
            if(count($defines)>0){
                foreach($means as $catemeans)
                {
                    ?>
                    <li> 
                        <h4 class="catgory"><?=$catemeans[1];?></h4>
                    <?php
                    for($i=0;$i<count($catemeans[2]);$i++)
                    {
                        $mean = $catemeans[2][$i];
                        ?>
                            <li> 
                                <div class="mean w3-card">
                                    <p><?=$mean->mean;?></p>
                                    <div class="rating" id="rating">
                                        <a class="like ">
                                            <span class="glyphicon glyphicon-thumbs-up"></span> Thích
                                        </a>
                                        <span class="likes"><?php echo count($mean->likemeans)>0?$mean->likemeans[0]->like:0;?></span>
                                        <span> &nbsp </span>
                                        <a class="dislike"> 
                                            <span class="glyphicon glyphicon-thumbs-down"></span> Không thích
                                        </a>
                                        <span class="dislikes" ><?php echo count($mean->likemeans)>0?$mean->likemeans[0]->dislike:0;?></span>
                                        <span> &nbsp&nbsp </span>
                                        <a class="comment" onclick="return viewcomment('mean','#mean<?=$mean->id?>',<?=$mean->id?>,0);">
                                            <span class="glyphicon glyphicon-comment"></span> Bình luận
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
            }
            else  echo "<p>Từ chưa có định nghĩa, ".$this->Html->link('đóng góp');
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