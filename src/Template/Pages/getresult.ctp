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
            <?php foreach($word['definitions'] as $define)
            {
                ?>
                <li> 
                    <div class="define w3-card">
                        <h4 class="catgory"><?=$define->cate_name;?></h4>
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
                    </div>
                </li>
                <?php
            }
            ?>
        </div>
        <div class="col-sm-6 text-left w3-card-2">
            <h1>Các nghĩa khác của từ:</h1>
            <ul class="means">
            <?php for($i=1;$i<count($word['means']);$i++)
            {
                $mean = $word['means'][$i];
                ?>
                    <li> 
                        <div class="mean w3-card">
                            <h4 class="catgory"><?=$mean->cate_name;?></h4>
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