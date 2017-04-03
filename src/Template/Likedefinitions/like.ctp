<?php
    if(isset($likedefinition))
    {
        $liked = "";
        switch($likedefinition->mylike){
            case 0:
                $liked = "disliked";
                break;
            case 1:
                $liked = "liked";
                break;
        }
        ?>
    <script>
        $("#ratingdefinition<?=$likedefinition->definition_id?>").removeClass();
        $("#ratingdefinition<?=$likedefinition->definition_id?>").addClass("rating");
        $("#ratingdefinition<?=$likedefinition->definition_id?>").addClass("<?=$liked?>");
    </script>
        <a class="like" onclick="return like_dislike('define',<?=$likedefinition->definition_id?>,1,'#like_dislikedefine<?=$likedefinition->definition_id?>');">
            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Thích&nbsp<span ><?=$likedefinition->like?></span>
        </a>
        <span> &nbsp </span>
        <a class="dislike" onclick="return like_dislike('define',<?=$likedefinition->definition_id?>,0,'#like_dislikedefine<?=$likedefinition->definition_id?>');"> 
            <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Không thích&nbsp<span><?=$likedefinition->dislike?></span>
        </a>
        <span> &nbsp </span>
    <?php 
    }
    else{
        exit();
    }
    ?>
    