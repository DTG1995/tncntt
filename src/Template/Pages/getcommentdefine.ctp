<?php
    $this->layout=null;
    // echo count($comments);
    pr($comments);
    if(count($comments)<0)
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
        <?php foreach($comments as $comment)
        {
            ?>
        <div class="comment">
            <b class="user"><?=$comment->user_name?></b><span><?=$comment->created?></span>
            <p><?=$comment->content?><p>
            <?php if($parent== null){?>
                <a class="comment">
                    <span class="glyphicon glyphicon-comment"></span> Bình luận</a>
                    <span class="comment"><?php echo count($comment->childrendefinecomment)>0?$comment->childrendefinecomment[0]->count:0 ?></span>
                </div>
            <?php }
            ?>
        <?php
        }?>
        <textarea class="newcomment" placeholder="Viết bình luận..."></textarea>
    </div>
<?php
    }
?>
