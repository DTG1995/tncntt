<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Likemean'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="likemeans index large-9 medium-8 columns content">
    <h3><?= __('Likemeans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('MEANS_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('USERS_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ISLIKE') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($likemeans as $likemean): ?>
            <tr>
                <td><?= $this->Number->format($likemean->MEANS_ID) ?></td>
                <td><?= $this->Number->format($likemean->USERS_ID) ?></td>
                <td><?= $this->Number->format($likemean->ISLIKE) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $likemean->IDMEAN]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $likemean->IDMEAN]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $likemean->IDMEAN], ['confirm' => __('Are you sure you want to delete # {0}?', $likemean->IDMEAN)]) ?>
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
