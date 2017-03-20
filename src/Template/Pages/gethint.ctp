<?php 
$listWord = "";
if(isset($words) ||  count($words)>0){
        foreach ($words as $word){
            $listWord = $listWord."\"".$word["word"]."\"".",";
            // echo "{\"name\":\"".$word->word."\",\"code\":\"".$word->id."\"}@";
            echo $word->word."@";
        }
}
 ?>
