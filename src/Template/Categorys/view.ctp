<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $category->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorys view large-9 medium-8 columns content">
    <h3><?= h($category->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('NAME') ?></th>
            <td><?= h($category->NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($category->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CONTRIBUTE') ?></th>
            <td><?= $this->Number->format($category->CONTRIBUTE) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ACTIVE') ?></th>
            <td><?= $category->ACTIVE ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
