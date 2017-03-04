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
                ['action' => 'delete', $likemean->mean_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $likemean->mean_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Likemeans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Means'), ['controller' => 'Means', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mean'), ['controller' => 'Means', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="likemeans form large-9 medium-8 columns content">
    <?= $this->Form->create($likemean) ?>
    <fieldset>
        <legend><?= __('Edit Likemean') ?></legend>
        <?php
            echo $this->Form->input('islike');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
