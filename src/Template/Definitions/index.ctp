<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="definitions index large-9 medium-8 columns content">
    <h3><?= __('Definitions') ?></h3>
    <?= $this->Html->link(__('New Definition'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('word_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('define') ?></th>
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
                <td><?= $definition->has('word') ? $this->Html->link($definition->word->word, ['controller' => 'Words', 'action' => 'view', $definition->word->id]) : '' ?></td>
                <td><?= $definition->define?></td>
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
