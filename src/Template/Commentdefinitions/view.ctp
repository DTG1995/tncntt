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
    </ul>
</nav>
<div class="commentdefinitions view large-9 medium-8 columns content">
    <h3><?= h($commentdefinition->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($commentdefinition->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IDPARENT') ?></th>
            <td><?= $this->Number->format($commentdefinition->IDPARENT) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DEFINITIONS ID') ?></th>
            <td><?= $this->Number->format($commentdefinition->DEFINITIONS_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('USERS ID') ?></th>
            <td><?= $this->Number->format($commentdefinition->USERS_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CREATED') ?></th>
            <td><?= h($commentdefinition->CREATED) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('CONTENT') ?></h4>
        <?= $this->Text->autoParagraph(h($commentdefinition->CONTENT)); ?>
    </div>
</div>
