<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mean'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['controller' => 'Commentmeans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Commentmean'), ['controller' => 'Commentmeans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Likemeans'), ['controller' => 'Likemeans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Likemean'), ['controller' => 'Likemeans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="means index large-9 medium-8 columns content">
    <h3><?= __('Means') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('word_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contribute') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($means as $mean): ?>
            <tr>
                <td><?= $this->Number->format($mean->id) ?></td>
                <td><?= $mean->has('word') ? $this->Html->link($mean->word->id, ['controller' => 'Words', 'action' => 'view', $mean->word->id]) : '' ?></td>
                <td><?= $this->Number->format($mean->contribute) ?></td>
                <td><?= $mean->has('user') ? $this->Html->link($mean->user->id, ['controller' => 'Users', 'action' => 'view', $mean->user->id]) : '' ?></td>
                <td><?= $mean->has('category') ? $this->Html->link($mean->category->name, ['controller' => 'Categorys', 'action' => 'view', $mean->category->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mean->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mean->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mean->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mean->id)]) ?>
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
