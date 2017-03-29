<?php
    $loguser = $this->request->session()->read('Auth.User');
    $this->layout=null;
    if($loguser!=null)
    {
        
        $idhtml = $parent==null?'#define'.$definition:'#commentdefine'.$parent;
        $idhtmlcomment = $idhtml."_comment";
        ?>
        <script>
            $("<?=$idhtmlcomment?>").text("<?=$count?>");
            </script>
        <?php
        if(count($comments)<1)
        {
            ?>
            <div class="comments">
            <?php
            if($loguser==null)
            {
                echo "<span>Bạn cần ".$this->Html->link('đăng nhập',['controller'=>'Users','action'=>'login'])." để có thể tham gia bình luận!</span>";
            }
            else
            {
                ?>
                <input type="text" onkeypress="addcomment('define','<?=$idhtml?>',<?=$definition?>,<?=$parent?>,this,event);" class="newcomment" placeholder="Viết bình luận..."/>
            <?php
            }
            ?>
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
                    <a class="comment" onclick="return viewcomment('define','#commentdefine<?=$comment->id?>',<?=$definition?>,<?=$comment->id?>);">
                    <i class="fa fa-comment-o" aria-hidden="true"></i> Bình luận</a>
                    <span class="comment" id="commentdefine<?=$comment->id?>_comment"><?php echo count($comment->childrendefinecomment)>0?$comment->childrendefinecomment[0]->count:0 ?></span>
                    <div id="commentdefine<?=$comment->id?>"></div>
                    <?php
                    }?>
                </div>
            </li>
            
        <?php
        }?>
        <li>
                <input type="text" onkeypress="addcomment('define','<?=$idhtml?>',<?=$definition?>,<?=$parent?>,this,event);" class="newcomment" placeholder="Viết bình luận..."/>
        </li>
        
        </div>
    <?php
        }
        }
?>