<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="means index large-9 medium-8 columns content">
    <h3><?= __('Nghĩa') ?></h3>
    <?= $this->Html->link(__('Thêm Nghĩa Mới'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Thuật Ngữ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nghĩa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Đóng Góp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('User') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Lĩnh Vực') ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($means as $mean): ?>
            <tr>
                <td><?= $this->Number->format($mean->id) ?></td>
                <td><?= $mean->has('word') ? $this->Html->link($mean->word->word, ['controller' => 'Words', 'action' => 'view', $mean->word->id]) : '' ?></td>
                <td><?=$mean->mean?></td>
                <td><?= $this->Number->format($mean->contribute) ?></td>
                <td><?= $mean->has('user') ? $this->Html->link($mean->user->namedisplay, ['controller' => 'Users', 'action' => 'view', $mean->user->id]) : '' ?></td>
                <td><?= $mean->has('category') ? $this->Html->link($mean->category->name, ['controller' => 'Categorys', 'action' => 'view', $mean->category->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Chi Tiết'), ['action' => 'view', $mean->id]) ?>
                    <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $mean->id]) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $mean->id], ['confirm' => __('Bạn Có Muốn Xóa Không?', $mean->id)]) ?>
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
