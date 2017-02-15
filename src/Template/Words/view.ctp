<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Word'), ['action' => 'edit', $word->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Word'), ['action' => 'delete', $word->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $word->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="words view large-9 medium-8 columns content">
    <h3><?= h($word->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('WORD') ?></th>
            <td><?= h($word->WORD) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($word->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IDCATE') ?></th>
            <td><?= $this->Number->format($word->IDCATE) ?></td>
        </tr>
    </table>
</div>
