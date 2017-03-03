<?php 
    $this->layout = false;
?>
<script>
 var data = "<?=$word['means'][0]->MEAN; ?>";
$("#txtresult").val(data);
</script>
<?php
    pr($word);
    
?>
<div class="row">
    <!--Dinh nghia-->
    <div class="col-md-6 definitions">
    <?php
        foreach($word['definitions'] as $def)
            echo "<p>".$def->DEFINE."</p></br>";
    ?>
    </div>
    <!--Nghia-->
    <div class="col-md-6 means">
    <?php
        foreach($word['means'] as $mean)
        {
            echo "<p>".$mean->MEAN."</p></br>";
        }
    ?>
    </div>
</div>