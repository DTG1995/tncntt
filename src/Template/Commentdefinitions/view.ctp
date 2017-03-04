<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Commentdefinition'), ['action' => 'edit', $commentdefinition->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Commentdefinition'), ['action' => 'delete', $commentdefinition->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $commentdefinition->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentdefinition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['controller' => 'Commentdefinitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentdefinition'), ['controller' => 'Commentdefinitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Definitions'), ['controller' => 'Definitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Definition'), ['controller' => 'Definitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="commentdefinitions view large-9 medium-8 columns content">
    <h3><?= h($commentdefinition->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($commentdefinition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Commentdefinition Id') ?></th>
            <td><?= $this->Number->format($commentdefinition->commentdefinition_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Definition Id') ?></th>
            <td><?= $this->Number->format($commentdefinition->definition_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($commentdefinition->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($commentdefinition->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($commentdefinition->content)); ?>
    </div>
</div>
