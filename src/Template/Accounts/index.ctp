<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Account'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accounts index large-9 medium-8 columns content">
    <h3><?= __('Accounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EMAIL') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NAMEDISPLAY') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ISADMIN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CREATED') ?></th>
                <th scope="col"><?= $this->Paginator->sort('LAST_LOGIN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('STATUS') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ACTIVE') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accounts as $account): ?>
            <tr>
                <td><?= $this->Number->format($account->ID) ?></td>
                <td><?= h($account->EMAIL) ?></td>
                <td><?= h($account->NAMEDISPLAY) ?></td>
                <td><?= h($account->ISADMIN) ?></td>
                <td><?= h($account->CREATED) ?></td>
                <td><?= h($account->LAST_LOGIN) ?></td>
                <td><?= $this->Number->format($account->STATUS) ?></td>
                <td><?= h($account->ACTIVE) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $account->EMAIL]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $account->EMAIL]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $account->EMAIL], ['confirm' => __('Are you sure you want to delete # {0}?', $account->EMAIL)]) ?>
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
