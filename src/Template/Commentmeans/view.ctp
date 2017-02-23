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
    </ul>
</nav>
<div class="commentmeans view large-9 medium-8 columns content">
    <h3><?= h($commentmean->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('EMAIL') ?></th>
            <td><?= h($commentmean->EMAIL) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($commentmean->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IDPARENT') ?></th>
            <td><?= $this->Number->format($commentmean->IDPARENT) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IDMEANS') ?></th>
            <td><?= $this->Number->format($commentmean->IDMEANS) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CREATED') ?></th>
            <td><?= h($commentmean->CREATED) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('CONTENT') ?></h4>
        <?= $this->Text->autoParagraph(h($commentmean->CONTENT)); ?>
    </div>
</div>
