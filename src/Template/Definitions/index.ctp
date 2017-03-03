<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Definition'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="definitions index large-9 medium-8 columns content">
    <h3><?= __('Definitions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('WORD_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('USER_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CONTRIBUTE') ?></th>
                <th scope="col"><?= $this->Paginator->sort('IDCATE') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($definitions as $definition): ?>
            <tr>
                <td><?= $this->Number->format($definition->ID) ?></td>
                <td><?= $this->Number->format($definition->WORD_ID) ?></td>
                <td><?= $this->Number->format($definition->USER_ID) ?></td>
                <td><?= $this->Number->format($definition->CONTRIBUTE) ?></td>
                <td><?= $this->Number->format($definition->IDCATE) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $definition->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $definition->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $definition->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $definition->ID)]) ?>
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
