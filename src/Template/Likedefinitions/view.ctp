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
    </ul>
</nav>
<div class="likedefinitions view large-9 medium-8 columns content">
    <h3><?= h($likedefinition->IDDEFINITION) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('DEFINITIONS ID') ?></th>
            <td><?= $this->Number->format($likedefinition->DEFINITIONS_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('USERS ID') ?></th>
            <td><?= $this->Number->format($likedefinition->USERS_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ISLIKE') ?></th>
            <td><?= $this->Number->format($likedefinition->ISLIKE) ?></td>
        </tr>
    </table>
</div>
