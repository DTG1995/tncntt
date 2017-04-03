<?php
    if(isset($likemean))
    {
        $liked = "";
        switch($likemean->mylike){
            case 0:
                $liked = "disliked";
                break;
            case 1:
                $liked = "liked";
                break;
        }
        $id="";
        if($top==0){
            $id = $likemean->mean_id;
        }
        ?>
        
    <script>
        $("#ratingmean<?=$id?>").removeClass();
        $("#ratingmean<?=$id?>").addClass("rating");
        $("#ratingmean<?=$id?>").addClass("<?=$liked?>");
    </script>
        <a class="like" onclick="return like_dislike('mean',<?=$likemean->mean_id?>,1,'#like_dislikemean<?=$likemean->mean_id?>',<?=$top?>);">
            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Thích&nbsp<span ><?=$likemean->like?></span>
        </a>
        <span> &nbsp </span>
        <a class="dislike" onclick="return like_dislike('mean',<?=$likemean->mean_id?>,0,'#like_dislikemean<?=$likemean->mean_id?>',<?=$top?>);"> 
            <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Không thích&nbsp<span><?=$likemean->dislike?></span>
        </a>
        <span> &nbsp </span>
    <?php 
    }
    else{
        exit();
    }
    ?>
    