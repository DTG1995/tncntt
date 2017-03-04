<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Likedefinition'), ['action' => 'edit', $likedefinition->IDDEFINITION]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Likedefinition'), ['action' => 'delete', $likedefinition->IDDEFINITION], ['confirm' => __('Are you sure you want to delete # {0}?', $likedefinition->IDDEFINITION)]) ?> </li>
        <li><?= $this->Html->link(__('List Likedefinitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Likedefinition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List D E F I N I T I O N S'), ['controller' => 'Definitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New D E F I N I T I O N '), ['controller' => 'Definitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="likedefinitions view large-9 medium-8 columns content">
    <h3><?= h($likedefinition->IDDEFINITION) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Definition Id') ?></th>
            <td><?= $this->Number->format($likedefinition->definition_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($likedefinition->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Islike') ?></th>
            <td><?= $this->Number->format($likedefinition->islike) ?></td>
        </tr>
    </table>
</div>
