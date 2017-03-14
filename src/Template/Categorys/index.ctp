<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="categorys index large-9 medium-8 columns content">

    <h3><?= __('Lĩnh Vực') ?></h3>
    <?= $this->Html->link(__('Thêm Lĩnh Mới'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name',['label'=>'Lĩnh vực']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contribute',['label'=>'Đóng Góp']) ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorys as $category): ?>
            <tr>
                <td><?= $this->Number->format($category->id) ?></td>
                <td><?= h($category->name) ?></td>
                <td><?= h($category->active) ?></td>
                <td><?= $this->Number->format($category->contribute) ?></td>
                <td class="actions">
                    <?=$this->Html->link("<i class='fa fa-info-circle'></i>",['action' => 'view', $category->id],[ 'escape' => false,'title'=>'Chi tiết']) ?>
                   
                    <?= $this->Html->link(__("<i class='fa fa-pencil'></i>"), ['action' => 'edit', $category->id],['escape' => false,'title'=>'chỉnh sửa']) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>',['action'   => 'delete',$category->id],['escape'   => false,'title'=>'xóa','confirm' => __('Bạn Có Muốn Xóa Không?', $category->id)]);
                     ?>
                    
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
