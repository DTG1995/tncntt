<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Commentdefinition'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commentdefinitions index large-9 medium-8 columns content">
    <h3><?= __('Commentdefinitions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CREATED') ?></th>
                <th scope="col"><?= $this->Paginator->sort('IDPARENT') ?></th>
                <th scope="col"><?= $this->Paginator->sort('IDDEFINITION') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EMAIL') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commentdefinitions as $commentdefinition): ?>
            <tr>
                <td><?= $this->Number->format($commentdefinition->ID) ?></td>
                <td><?= h($commentdefinition->CREATED) ?></td>
                <td><?= $this->Number->format($commentdefinition->IDPARENT) ?></td>
                <td><?= $this->Number->format($commentdefinition->IDDEFINITION) ?></td>
                <td><?= h($commentdefinition->EMAIL) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $commentdefinition->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $commentdefinition->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $commentdefinition->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $commentdefinition->ID)]) ?>
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
