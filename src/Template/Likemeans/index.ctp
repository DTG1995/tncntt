<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Likemean'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Means'), ['controller' => 'Means', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mean'), ['controller' => 'Means', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="likemeans index large-9 medium-8 columns content">
    <h3><?= __('Likemeans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('mean_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('islike') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($likemeans as $likemean): ?>
            <tr>
                <td><?= $likemean->has('mean') ? $this->Html->link($likemean->mean->id, ['controller' => 'Means', 'action' => 'view', $likemean->mean->id]) : '' ?></td>
                <td><?= $likemean->has('user') ? $this->Html->link($likemean->user->id, ['controller' => 'Users', 'action' => 'view', $likemean->user->id]) : '' ?></td>
                <td><?= $this->Number->format($likemean->islike) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $likemean->mean_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $likemean->mean_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $likemean->mean_id], ['confirm' => __('Are you sure you want to delete # {0}?', $likemean->mean_id)]) ?>
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
