<?php 
    $this->layout = false;
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