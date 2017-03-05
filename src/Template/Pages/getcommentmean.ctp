<?php
    $this->layout=null;
    if(count($comments)<1)
    {
        ?>
        <div class="comments">
            <textarea class="newcomment" placeholder="Viết bình luận..."></textarea>
        </div>
        <?php
    }
    else
    {
?>
    <div class="comments">
    <ul>
        <?php foreach($comments as $comment)
        {
            ?>
        <li>
            <div class="comment">
                <b class="user"><?=$comment->user_name?></b><span><?=$comment->created?></span>
                <p><?=$comment->content?><p>
                <?php if($parent==0)
                {?>
                <a class="comment" onclick="return viewcomment('mean','#commentmean<?=$comment->id?>',<?=$mean?>,<?=$comment->id?>);">
                <span class="glyphicon glyphicon-comment"></span> Bình luận</a>
                <span class="comment"><?php echo count($comment->children)>0?$comment->children[0]->count:0 ?></span>
                <div id="commentmean<?=$comment->id?>"></div>
                <?php
                }?>
            </div>
        </li>
    
    <?php
    }?>
        <li>
            <textarea class="newcomment" placeholder="Viết bình luận..."></textarea>
        </li>
    </ul>
    </div>
<?php
    }
?>
