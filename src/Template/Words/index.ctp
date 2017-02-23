<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Word'), ['action' => 'add']) ?></li>
    </ul>
</nav>-->
<div class="words index large-9 medium-8 columns content">
    <h3><?= __('Words') ?></h3>
    <table class="table table-bordered" style="width:100%;" cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('WORD') ?></th>
                <th scope="col"><?= $this->Paginator->sort('IDCATE') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($words as $word): ?>
            <tr>
                <td><?= $this->Number->format($word->ID) ?></td>
                <td><?= h($word->WORD) ?></td>
                <td><?= $this->Number->format($word->IDCATE) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $word->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $word->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $word->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $word->ID)]) ?>
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
    </div>
</div>
