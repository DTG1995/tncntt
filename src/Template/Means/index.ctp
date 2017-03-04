<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="means index large-9 medium-8 columns content">
    <h3><?= __('Means') ?></h3>
    <?= $this->Html->link(__('New Mean'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('word_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mean') ?></th>
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
                <td><?=$mean->mean?></td>
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
