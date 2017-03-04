<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Likedefinition'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Definitions'), ['controller' => 'Definitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Definition'), ['controller' => 'Definitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="likedefinitions index large-9 medium-8 columns content">
    <h3><?= __('Likedefinitions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('definition_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('islike') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($likedefinitions as $likedefinition): ?>
            <tr>
                <td><?= $likedefinition->has('definition') ? $this->Html->link($likedefinition->definition->id, ['controller' => 'Definitions', 'action' => 'view', $likedefinition->definition->id]) : '' ?></td>
                <td><?= $likedefinition->has('user') ? $this->Html->link($likedefinition->user->id, ['controller' => 'Users', 'action' => 'view', $likedefinition->user->id]) : '' ?></td>
                <td><?= $this->Number->format($likedefinition->islike) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $likedefinition->definition_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $likedefinition->definition_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $likedefinition->definition_id], ['confirm' => __('Are you sure you want to delete # {0}?', $likedefinition->definition_id)]) ?>
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
