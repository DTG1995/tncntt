<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Quản Lý Người Dùng') ?></h3>
    <?= $this->Html->link(__('Thêm Người Dùng Mới'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Tên Hiển Thị') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Admin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Thời Gian') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Đăng Nhập Lần Cuối') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Trạng Thái') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Hoạt Động') ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->namedisplay) ?></td>
                <td><?= h($user->isadmin) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->last_login) ?></td>
                <td><?= $this->Number->format($user->status) ?></td>
                <td><?= h($user->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Chi Tiết'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $user->id], ['confirm' => __('Bạn Có Muốn Xóa Không?', $user->id)]) ?>
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
