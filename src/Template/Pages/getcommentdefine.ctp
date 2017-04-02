<?php
    $loguser = $this->request->session()->read('Auth.User');
    $this->layout=null;
    $idhtml = $parent==0?'#define'.$definition:'#commentdefine'.$parent;
    if(count($comments)<1)
    {
        ?>
     
        <div class="comments cmment1">
            <b class="user"><?=$loguser['namedisplay']?></b>
            <input type="text" onkeypress="addcomment('define','<?=$idhtml?>',<?=$definition?>,<?=$parent?>,this,event);" class="newcomment" placeholder="Viết bình luận..."/>
        </div>
        <?php
    }
    else
    {
?>
    <div class="comments w3-margin">
    <ul class="w3-ul w3-hoverable">
        <?php foreach($comments as $comment)
        {
            ?>
        <li class="w3-border-left w3-padding-small">
            <div class="" style="width:50px">
                <?=$this->Html->image('image.ico',['alt'=>'ico','class'=>'w3-left w3-margin-right']) ?>
            </div>
            <div class="comment">
                <p class="time1"><b class="user"><?=$comment->user_name?></b><span>&nbsp;<?=$comment->created?></span></p>
                <p><?=$comment->content?><p>
                <?php if($parent==0)
                {?>
                <a class="comment" onclick="return viewcomment('define','#commentdefine<?=$comment->id?>',<?=$definition?>,<?=$comment->id?>);">
                <span class="glyphicon glyphicon-comment"></span> Bình luận</a>
                <span class="comment" id="commentdefine<?=$comment->id?>_comment"><?php echo count($comment->childrendefinecomment)>0?$comment->childrendefinecomment[0]->count:0 ?></span>
                <div id="commentdefine<?=$comment->id?>"></div>
                <?php
                }?>
            </div>
        </li>
    
    <?php
    }
   
        ?>
        <li class="cmment1">
            <b class="user"><?=$loguser['namedisplay']?></b>
            <input type="text" onkeypress="addcomment('define','<?=$idhtml?>',<?=$definition?>,<?=$parent?>,this,event);" class="newcomment" placeholder="Viết bình luận..."/>
        </li>

    </ul>
    </div>
<?php
    }
?>
