<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mean'), ['action' => 'edit', $mean->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mean'), ['action' => 'delete', $mean->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $mean->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Means'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mean'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="means view large-9 medium-8 columns content">
    <h3><?= h($mean->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('EMAIL') ?></th>
            <td><?= h($mean->EMAIL) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($mean->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IDWORD') ?></th>
            <td><?= $this->Number->format($mean->IDWORD) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CONTRIBUTE') ?></th>
            <td><?= $this->Number->format($mean->CONTRIBUTE) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IDCATE') ?></th>
            <td><?= $this->Number->format($mean->IDCATE) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('MEAN') ?></h4>
        <?= $this->Text->autoParagraph(h($mean->MEAN)); ?>
    </div>
</div>
