<!-- <?php  
    if(isset($words) ||  count($words)>0)
        foreach ($words as $word){
            ?>
            <li onClick="selectWord('<?=$word->word?>');">
                <?=$word->word?>
            <?php
        }
?> -->
<?php 
$listWord = "";
if(isset($words) ||  count($words)>0){
        foreach ($words as $word){
            $listWord = $listWord."\"".$word["word"]."\"".",";
        }
}
 ?>

<script type="text/javascript">
           	
$(document).ready( function() {
    var availableTags = [
        <?=$listWord?>
	 ];
    $( "#search-box" ).autocomplete({
      source: availableTags
    });
    console.log(availableTags);
  });
</script>
