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
                ['action' => 'delete', $commentmean->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $commentmean->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Means'), ['controller' => 'Means', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mean'), ['controller' => 'Means', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['controller' => 'Commentmeans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Commentmean'), ['controller' => 'Commentmeans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commentmeans form large-9 medium-8 columns content">
    <?= $this->Form->create($commentmean) ?>
    <fieldset>
        <legend><?= __('Edit Commentmean') ?></legend>
        <?php
            echo $this->Form->input('content');
            echo $this->Form->input('commentmean_id');
            echo $this->Form->input('mean_id', ['options' => $means]);
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
