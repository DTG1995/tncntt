<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="words index large-9 medium-8 columns content">
    <h3><?= __('Thuật Ngữ') ?></h3>
     <?= $this->Html->link(__('Thêm Thuật Ngữ Mới'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Thuật Ngữ') ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($words as $word): ?>
            <tr>
                <td><?= $this->Number->format($word->id) ?></td>
                <td><?= h($word->word) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Chi Tiết'), ['action' => 'view', $word->id]) ?>
                    <?= $this->Html->link(__('sửa'), ['action' => 'edit', $word->id]) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $word->id], ['confirm' => __('Bạn Có Muốn Xóa Không ?', $word->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php if($this->Paginator->pages>0){?>
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
            <?php } ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
