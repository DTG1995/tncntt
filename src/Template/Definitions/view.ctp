<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Definition'), ['action' => 'edit', $definition->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Definition'), ['action' => 'delete', $definition->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $definition->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Definitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Definition'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="definitions view large-9 medium-8 columns content">
    <h3><?= h($definition->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($definition->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('WORDS ID') ?></th>
            <td><?= $this->Number->format($definition->WORDS_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('USERS ID') ?></th>
            <td><?= $this->Number->format($definition->USERS_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CONTRIBUTE') ?></th>
            <td><?= $this->Number->format($definition->CONTRIBUTE) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('DEFINE') ?></h4>
        <?= $this->Text->autoParagraph(h($definition->DEFINE)); ?>
    </div>
</div>
