<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Commentdefinition'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Definitions'), ['controller' => 'Definitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Definition'), ['controller' => 'Definitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commentdefinitions index large-9 medium-8 columns content">
    <h3><?= __('Commentdefinitions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('commentdefinition_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('definition_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commentdefinitions as $commentdefinition): ?>
            <tr>
                <td><?= $this->Number->format($commentdefinition->id) ?></td>
                <td><?= h($commentdefinition->created) ?></td>
                <td><?= $this->Number->format($commentdefinition->commentdefinition_id) ?></td>
                <td><?= $commentdefinition->has('definition') ? $this->Html->link($commentdefinition->definition->id, ['controller' => 'Definitions', 'action' => 'view', $commentdefinition->definition->id]) : '' ?></td>
                <td><?= $commentdefinition->has('user') ? $this->Html->link($commentdefinition->user->id, ['controller' => 'Users', 'action' => 'view', $commentdefinition->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $commentdefinition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $commentdefinition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $commentdefinition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentdefinition->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
