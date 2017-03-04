<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Definition'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['controller' => 'Commentdefinitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Commentdefinition'), ['controller' => 'Commentdefinitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Likedefinitions'), ['controller' => 'Likedefinitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Likedefinition'), ['controller' => 'Likedefinitions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="definitions index large-9 medium-8 columns content">
    <h3><?= __('Definitions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('word_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contribute') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($definitions as $definition): ?>
            <tr>
                <td><?= $this->Number->format($definition->id) ?></td>
                <td><?= $definition->has('word') ? $this->Html->link($definition->word->id, ['controller' => 'Words', 'action' => 'view', $definition->word->id]) : '' ?></td>
                <td><?= $definition->has('user') ? $this->Html->link($definition->user->id, ['controller' => 'Users', 'action' => 'view', $definition->user->id]) : '' ?></td>
                <td><?= $this->Number->format($definition->contribute) ?></td>
                <td><?= $definition->has('category') ? $this->Html->link($definition->category->name, ['controller' => 'Categorys', 'action' => 'view', $definition->category->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $definition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $definition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $definition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $definition->id)]) ?>
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
