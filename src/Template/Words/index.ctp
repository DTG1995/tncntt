<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="words index large-9 medium-8 columns content">
    <h3><?= __('Thuật Ngữ') ?></h3>
     <?= $this->Html->link(__('Thêm Thuật Ngữ Mới'), ['action' => 'addwordmean']) ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('word',['label'=>'Thuật Ngữ']) ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($words as $word): ?>
            <tr>
                <td><?= $this->Number->format($word->id) ?></td>
                <td><?= h($word->word) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__("<i class='fa fa-info-circle'></i>"), ['action' => 'view', $word->id],[ 'escape' => false,'title'=>'Chi tiết']) ?>
                    <?= $this->Html->link(__("<i class='fa fa-pencil'></i>"), ['action' => 'edit', $word->id],['escape' => false,'title'=>'chỉnh sửa']) ?>
                     <?= $this->Form->postLink('<i class="fa fa-trash"></i>',['action'   => 'delete',$word->id],['escape'   => false,'title'=>'xóa','confirm' => __('Bạn Có Muốn Xóa Không?', $word->id)]);
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}')]) ?></p>
    </div>
</div>
