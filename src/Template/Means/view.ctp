<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="means view large-9 medium-8 columns content">
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('Thuật Ngữ') ?></th>
            <td><?= $mean->has('word') ? $this->Html->link($mean->word->word, ['controller' => 'Words', 'action' => 'view', $mean->word->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $mean->has('user') ? $this->Html->link($mean->user->namedisplay, ['controller' => 'Users', 'action' => 'view', $mean->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lĩnh Vực') ?></th>
            <td><?= $mean->has('category') ? $this->Html->link($mean->category->name, ['controller' => 'Categorys', 'action' => 'view', $mean->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Đóng Góp') ?></th>
            <td><?= $this->Number->format($mean->contribute) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Nghĩa') ?></h4>
        <?= $this->Text->autoParagraph(h($mean->mean)); ?>
    </div>
    <div class="related">
        <h4><?= __('Bình Luận Liên Quan Đến Nghĩa') ?></h4>
        <?php if (!empty($mean->commentmeans)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Nội Dung') ?></th>
                <th scope="col"><?= __('Thời Gian') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
            <?php foreach ($mean->commentmeans as $commentmeans):?>
            <tr>

                <td><?= h($commentmeans->content) ?></td>
                <td><?= h($commentmeans->created) ?></td>
                <td><?= h($commentmeans->user->namedisplay) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>',['action'   => 'delete',$commentmeans->id],['escape'   => false,'title'=>'xóa','confirm' => __('Bạn Có Muốn Xóa Không?', $commentmeans->id)]);
                     ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Like Liên Quan Đến Nghĩa') ?></h4>
        <?php if (!empty($mean->likemeans)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Nghĩa') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Islike') ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
            <?php foreach ($mean->likemeans as $likemeans): ?>
            <tr>
                <td><?= h($likemeans->mean->mean) ?></td>
                <td><?= h($likemeans->user->namedisplay) ?></td>
                <td><?= h($likemeans->islike) ?></td>
                <td class="actions">
                     <?= $this->Form->postLink('<i class="fa fa-trash"></i>',['action'   => 'delete',$likemeans->mean_id],['escape'   => false,'title'=>'xóa','confirm' => __('Bạn Có Muốn Xóa Không?', $likemeans->mean_id)]);
                     ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
