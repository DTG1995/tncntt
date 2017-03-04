<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Likedefinitions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List D E F I N I T I O N S'), ['controller' => 'Definitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New D E F I N I T I O N'), ['controller' => 'Definitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="likedefinitions form large-9 medium-8 columns content">
    <?= $this->Form->create($likedefinition) ?>
    <fieldset>
        <legend><?= __('Add Likedefinition') ?></legend>
        <?php
            echo $this->Form->input('definition_id');
            echo $this->Form->input('user_id');
            echo $this->Form->input('islike');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
