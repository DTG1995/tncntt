<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $commentdefinition->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $commentdefinition->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['controller' => 'Commentdefinitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Commentdefinition'), ['controller' => 'Commentdefinitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Definitions'), ['controller' => 'Definitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Definition'), ['controller' => 'Definitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commentdefinitions form large-9 medium-8 columns content">
    <?= $this->Form->create($commentdefinition) ?>
    <fieldset>
        <legend><?= __('Edit Commentdefinition') ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('content');
            echo $this->Form->input('commentdefinition_id');
            echo $this->Form->input('definition_id');
            echo $this->Form->input('user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
