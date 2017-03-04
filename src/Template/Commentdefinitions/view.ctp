<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Commentdefinition'), ['action' => 'edit', $commentdefinition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Commentdefinition'), ['action' => 'delete', $commentdefinition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentdefinition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentdefinition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Definitions'), ['controller' => 'Definitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Definition'), ['controller' => 'Definitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['controller' => 'Commentdefinitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentdefinition'), ['controller' => 'Commentdefinitions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="commentdefinitions view large-9 medium-8 columns content">
    <h3><?= h($commentdefinition->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Definition') ?></th>
            <td><?= $commentdefinition->has('definition') ? $this->Html->link($commentdefinition->definition->id, ['controller' => 'Definitions', 'action' => 'view', $commentdefinition->definition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $commentdefinition->has('user') ? $this->Html->link($commentdefinition->user->id, ['controller' => 'Users', 'action' => 'view', $commentdefinition->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($commentdefinition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Commentdefinition Id') ?></th>
            <td><?= $this->Number->format($commentdefinition->commentdefinition_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Commentdefinitions') ?></h4>
        <?php if (!empty($commentdefinition->commentdefinitions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Commentdefinition Id') ?></th>
                <th scope="col"><?= __('Definition Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($commentdefinition->commentdefinitions as $commentdefinitions): ?>
            <tr>
                <td><?= h($commentdefinitions->id) ?></td>
                <td><?= h($commentdefinitions->content) ?></td>
                <td><?= h($commentdefinitions->created) ?></td>
                <td><?= h($commentdefinitions->commentdefinition_id) ?></td>
                <td><?= h($commentdefinitions->definition_id) ?></td>
                <td><?= h($commentdefinitions->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Commentdefinitions', 'action' => 'view', $commentdefinitions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Commentdefinitions', 'action' => 'edit', $commentdefinitions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commentdefinitions', 'action' => 'delete', $commentdefinitions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentdefinitions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
