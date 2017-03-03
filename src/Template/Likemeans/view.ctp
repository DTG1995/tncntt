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
    </ul>
</nav>
<div class="likemeans view large-9 medium-8 columns content">
    <h3><?= h($likemean->IDMEAN) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('MEAN ID') ?></th>
            <td><?= $this->Number->format($likemean->MEAN_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('USER ID') ?></th>
            <td><?= $this->Number->format($likemean->USER_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ISLIKE') ?></th>
            <td><?= $this->Number->format($likemean->ISLIKE) ?></td>
        </tr>
    </table>
</div>
