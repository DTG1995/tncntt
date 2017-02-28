<?php  
    if(isset($words) ||  count($words)>0)
        foreach ($words as $word){
            ?>
            <li onClick="selectWord('<?=$word['WORD']?>');">
                <?=$word->WORD?>
            <?php
        }
?>