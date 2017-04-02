<?php
    $loguser = $this->request->session()->read('Auth.User');
    $this->layout=null;
    $idhtml = $parent==0?'#mean'.$mean:'#commentmean'.$parent;
    if(count($comments)<1)
    {
        ?>
        <div class="comments cmment1">
            <b class="user"><?=$loguser['namedisplay']?></b>
            <input type="text" onkeypress="addcomment('mean','<?=$idhtml?>',<?=$mean?>,<?=$parent?>,this,event);" class="newcomment w3-input" placeholder="Viết bình luận..."/>
        </div>
        <?php
    }
    else
    {
?>
    <div class="comments w3-margin">
    <ul class="w3-ul w3-hoverable">
        <?php
        // pr($comments);
         //foreach($comments as )
         for($i = count($comments)-1;$i>=0;$i--)
        {
            $comment = $comments[$i];
            ?>
        <li class="w3-border-left w3-padding-small">
            <div class="" style="width:50px">
                <?=$this->Html->image('image.ico',['alt'=>'ico','class'=>'w3-left w3-margin-right']) ?>
            </div>
            <div class="comment">
                <p class="time1"><b class="user"><?=$comment->user_name?></b><span>&nbsp;<?=$comment->created->i18nFormat('dd-MM-yyyy HH:mm:ss')?></span></p>
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
    
    ?>
    <li class="cmment">
        <b class="user"><?=$comment->user_name?></b>
        <input type="text" onkeypress="addcomment('mean','<?=$idhtml?>',<?=$mean?>,<?=$parent?>,this,event);" class="newcomment w3-input" placeholder="Viết bình luận..."/>
    </li>
    
    </ul>
    </div>
<?php
}
?>
