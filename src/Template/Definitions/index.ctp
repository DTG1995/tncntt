<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="definitions index large-9 medium-8 columns content">
    <h3><?= __('Định Nghĩa') ?></h3>
    <?= $this->Html->link(__('Thêm Định Nghĩa Mới'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('word_id',['label'=>'Thuật Ngữ']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('define',['label'=>'Định Nghĩa']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id',['label'=>'User']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('contribute',['label'=>'Đóng Góp']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id',['label'=>'Lĩnh Vực']) ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($definitions as $definition): ?>
            <tr>
                <td><?= $this->Number->format($definition->id) ?></td>
                <td><?= $definition->has('word') ? $this->Html->link($definition->word->word, ['controller' => 'Words', 'action' => 'view', $definition->word->id]) : '' ?></td>
                <td><?= $definition->define?></td>
                <td><?= $definition->has('user') ? $this->Html->link($definition->user->namedisplay, ['controller' => 'Users', 'action' => 'view', $definition->user->id]) : '' ?></td>
                <td><?= $this->Number->format($definition->contribute) ?></td>
                <td><?= $definition->has('category') ? $this->Html->link($definition->category->name, ['controller' => 'Categorys', 'action' => 'view', $definition->category->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Chi Tiết'), ['action' => 'view', $definition->id]) ?>
                    <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $definition->id]) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $definition->id], ['confirm' => __('Bạn Có Muốn Xóa Không?', $definition->id)]) ?>
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
