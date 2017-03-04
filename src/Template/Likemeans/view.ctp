<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Likemean'), ['action' => 'edit', $likemean->IDMEAN]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Likemean'), ['action' => 'delete', $likemean->IDMEAN], ['confirm' => __('Are you sure you want to delete # {0}?', $likemean->IDMEAN)]) ?> </li>
        <li><?= $this->Html->link(__('List Likemeans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Likemean'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List M E A N S'), ['controller' => 'Definitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New M E A N '), ['controller' => 'Definitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="likemeans view large-9 medium-8 columns content">
    <h3><?= h($likemean->IDMEAN) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mean Id') ?></th>
            <td><?= $this->Number->format($likemean->mean_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($likemean->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Islike') ?></th>
            <td><?= $this->Number->format($likemean->islike) ?></td>
        </tr>
    </table>
</div>
