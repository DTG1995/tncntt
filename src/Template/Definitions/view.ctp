<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="definitions view large-9 medium-8 columns content">
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('Thuật Ngữ: ') ?></th>
            <td><?= $definition->has('word') ? $this->Html->link($definition->word->word, ['controller' => 'Words', 'action' => 'view', $definition->word->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $definition->has('user') ? $this->Html->link($definition->user->namedisplay, ['controller' => 'Users', 'action' => 'view', $definition->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $definition->has('category') ? $this->Html->link($definition->category->name, ['controller' => 'Categorys', 'action' => 'view', $definition->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Đóng Góp') ?></th>
            <td><?= $this->Number->format($definition->contribute) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Định Nghĩa') ?></h4>
        <?= $this->Text->autoParagraph(h($definition->define)); ?>
    </div>
    <div class="related">
        <h4><?= __('Bình Luận Liên Quan Đến Định Nghĩa') ?></h4>
        <?php if (!empty($definition->commentdefinitions)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Nội Dung') ?></th>
                <th scope="col"><?= __('Thời Gian') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
            <?php foreach ($definition->commentdefinitions as $commentdefinitions): ?>
            <tr>
                <td><?= h($commentdefinitions->content) ?></td>
                <td><?= h($commentdefinitions->created) ?></td>
                <td><?= h($commentdefinitions->user->namedisplay) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Chi Tiết'), ['controller' => 'Commentdefinitions', 'action' => 'view', $commentdefinitions->id]) ?>
                    <?= $this->Html->link(__('Sửa'), ['controller' => 'Commentdefinitions', 'action' => 'edit', $commentdefinitions->id]) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['controller' => 'Commentdefinitions', 'action' => 'delete', $commentdefinitions->id], ['confirm' => __('Bạn Có Muốn Xóa Không?', $commentdefinitions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Like Liên Quan Đến Định Nghĩa') ?></h4>
        <?php if (!empty($definition->likedefinitions)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Definition Id') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Islike') ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
            <?php foreach ($definition->likedefinitions as $likedefinitions): ?>
            <tr>
                <td><?= h($likedefinitions->definition_id) ?></td>
                <td><?= h($likedefinitions->user->namedisplay) ?></td>
                <td><?= h($likedefinitions->islike) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Chi Tiết'), ['controller' => 'Likedefinitions', 'action' => 'view', $likedefinitions->definition_id]) ?>
                    <?= $this->Html->link(__('Sửa'), ['controller' => 'Likedefinitions', 'action' => 'edit', $likedefinitions->definition_id]) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['controller' => 'Likedefinitions', 'action' => 'delete', $likedefinitions->definition_id], ['confirm' => __('Bạn Có Muốn Xóa Không ?', $likedefinitions->definition_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
