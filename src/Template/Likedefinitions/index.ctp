<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Likedefinition'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="likedefinitions index large-9 medium-8 columns content">
    <h3><?= __('Likedefinitions') ?></h3>
    <table class="table-striped" style="width:100%;" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('IDDEFINITION') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EMAIL') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ISLIKE') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($likedefinitions as $likedefinition): ?>
            <tr>
                <td><?= $this->Number->format($likedefinition->IDDEFINITION) ?></td>
                <td><?= $this->Number->format($likedefinition->EMAIL) ?></td>
                <td><?= $this->Number->format($likedefinition->ISLIKE) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $likedefinition->IDDEFINITION]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $likedefinition->IDDEFINITION]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $likedefinition->IDDEFINITION], ['confirm' => __('Are you sure you want to delete # {0}?', $likedefinition->IDDEFINITION)]) ?>
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
