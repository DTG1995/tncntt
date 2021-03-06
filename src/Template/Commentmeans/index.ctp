<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Commentmean'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commentmeans index large-9 medium-8 columns content">
    <h3><?= __('Commentmeans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CREATED') ?></th>
                <th scope="col"><?= $this->Paginator->sort('IDPARENT') ?></th>
                <th scope="col"><?= $this->Paginator->sort('IDMEANS') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ACCOUNT') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commentmeans as $commentmean): ?>
            <tr>
                <td><?= $this->Number->format($commentmean->ID) ?></td>
                <td><?= h($commentmean->CREATED) ?></td>
                <td><?= $this->Number->format($commentmean->IDPARENT) ?></td>
                <td><?= $this->Number->format($commentmean->IDMEANS) ?></td>
                <td><?= $this->Number->format($commentmean->ACCOUNT) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $commentmean->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $commentmean->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $commentmean->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $commentmean->ID)]) ?>
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
