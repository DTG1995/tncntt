<?php
    $loguser = $this->request->session()->read('Auth.User');
    $this->layout=null;
    $idhtml = $parent==0?'#mean'.$mean:'#commentmean'.$parent;
    if(count($comments)<1)
    {
        if($loguser==null)
        {
            echo "<span>Bạn cần ".$this->Html->link('đăng nhập',['controller'=>'Users','action'=>'login'])." để có thể tham gia bình luận!</span>";
        }
        else
        {
        ?>
        <div class="comments">
            <input type="text" onkeypress="addcomment('mean','<?=$idhtml?>',<?=$mean?>,<?=$parent?>,this,event);" class="newcomment" placeholder="Viết bình luận..."/>
        </div>
        <?php
        }
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
                <span class="comment" id="commentmean<?=$comment->id?>_comment"><?php echo count($comment->children)>0?$comment->children[0]->count:0 ?></span>
                <div id="commentmean<?=$comment->id?>"></div>
                <?php
                }?>
            </div>
        </li>
    
    <?php
    }
    if($loguser==null)
    {
        echo "<li><span>Bạn cần ".$this->Html->link('đăng nhập',['controller'=>'Users','action'=>'login'])." để có thể tham gia bình luận!</span></li>";
    }
    else
    {
    ?>
    <li>
        <input type="text" onkeypress="addcomment('mean','<?=$idhtml?>',<?=$mean?>,<?=$parent?>,this,event);" class="newcomment" placeholder="Viết bình luận..."/>
    </li>
    <?php
    }
    ?>
    </ul>
    </div>
<?php
}
?>
