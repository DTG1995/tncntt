<?php
/**
  * @var \App\View\AppView $this
  */
    if($notifi->type=='add'){
        echo $this->element('Notifications/contribute');
    }
    else{
        echo $this->element('Notifications/warning');
    }
?>