<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Definitions'), ['controller' => 'Definitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Definition'), ['controller' => 'Definitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['controller' => 'Commentdefinitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Commentdefinition'), ['controller' => 'Commentdefinitions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commentdefinitions form large-9 medium-8 columns content">
    <?= $this->Form->create($commentdefinition) ?>
    <fieldset>
        <legend><?= __('Add Commentdefinition') ?></legend>
        <?php
            echo $this->Form->control('content');
            echo $this->Form->control('commentdefinition_id');
            echo $this->Form->control('definition_id', ['options' => $definitions]);
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
