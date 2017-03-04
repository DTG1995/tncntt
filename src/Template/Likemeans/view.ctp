<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Likemean'), ['action' => 'edit', $likemean->mean_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Likemean'), ['action' => 'delete', $likemean->mean_id], ['confirm' => __('Are you sure you want to delete # {0}?', $likemean->mean_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Likemeans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Likemean'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Means'), ['controller' => 'Means', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mean'), ['controller' => 'Means', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="likemeans view large-9 medium-8 columns content">
    <h3><?= h($likemean->mean_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mean') ?></th>
            <td><?= $likemean->has('mean') ? $this->Html->link($likemean->mean->id, ['controller' => 'Means', 'action' => 'view', $likemean->mean->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $likemean->has('user') ? $this->Html->link($likemean->user->id, ['controller' => 'Users', 'action' => 'view', $likemean->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Islike') ?></th>
            <td><?= $this->Number->format($likemean->islike) ?></td>
        </tr>
    </table>
</div>
