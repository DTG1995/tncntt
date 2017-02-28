<?php 
    $this->layout = false;
    if(count($means)==0 && count($definition)==0)
        exit();
?>
<div class="row">
    <!--Dinh nghia-->
    <div class="col-md-6 definitions">
    <?php
        foreach($definition as $def)
            echo "<p>".$def->DEFINE."</p></br>";
    ?>
    </div>
    <!--Nghia-->
    <div class="col-md-6 means">
    <?php
        foreach($means as $mean)
        {
            echo "<p>".$mean->MEAN."</p></br>";
        }
    ?>
    </div>
</div>