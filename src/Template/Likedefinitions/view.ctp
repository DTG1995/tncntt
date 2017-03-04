<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Likedefinition'), ['action' => 'edit', $likedefinition->definition_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Likedefinition'), ['action' => 'delete', $likedefinition->definition_id], ['confirm' => __('Are you sure you want to delete # {0}?', $likedefinition->definition_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Likedefinitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Likedefinition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Definitions'), ['controller' => 'Definitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Definition'), ['controller' => 'Definitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="likedefinitions view large-9 medium-8 columns content">
    <h3><?= h($likedefinition->definition_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Definition') ?></th>
            <td><?= $likedefinition->has('definition') ? $this->Html->link($likedefinition->definition->id, ['controller' => 'Definitions', 'action' => 'view', $likedefinition->definition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $likedefinition->has('user') ? $this->Html->link($likedefinition->user->id, ['controller' => 'Users', 'action' => 'view', $likedefinition->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Islike') ?></th>
            <td><?= $this->Number->format($likedefinition->islike) ?></td>
        </tr>
    </table>
</div>
