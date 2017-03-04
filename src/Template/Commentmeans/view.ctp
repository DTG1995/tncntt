<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Commentmean'), ['action' => 'edit', $commentmean->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Commentmean'), ['action' => 'delete', $commentmean->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $commentmean->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentmean'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['controller' => 'Commentmeans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentmean'), ['controller' => 'Commentmeans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Means'), ['controller' => 'Means', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mean'), ['controller' => 'Means', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="commentmeans view large-9 medium-8 columns content">
    <h3><?= h($commentmean->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($commentmean->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Commentmean Id') ?></th>
            <td><?= $this->Number->format($commentmean->commentmean_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mean Id') ?></th>
            <td><?= $this->Number->format($commentmean->mean_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($commentmean->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($commentmean->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($commentmean->content)); ?>
    </div>
</div>
