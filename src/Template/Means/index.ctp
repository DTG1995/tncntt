<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mean'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="means index large-9 medium-8 columns content">
    <h3><?= __('Means') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('WORDS_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CONTRIBUTE') ?></th>
                <th scope="col"><?= $this->Paginator->sort('USERS_ID') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($means as $mean): ?>
            <tr>
                <td><?= $this->Number->format($mean->ID) ?></td>
                <td><?= $this->Number->format($mean->WORDS_ID) ?></td>
                <td><?= $this->Number->format($mean->CONTRIBUTE) ?></td>
                <td><?= $this->Number->format($mean->USERS_ID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mean->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mean->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mean->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $mean->ID)]) ?>
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
