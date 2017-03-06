<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="words view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Thuật Ngữ:') ?></th>
            <td><?= h($word->word) ?></td>
        </tr>

    </table>
    <div class="related">
        <h4><?= __('Định Nghĩa Liên Quan') ?></h4>
        <?php if (!empty($word->definitions)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Định Nghĩa') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Đóng Góp') ?></th>
                <th scope="col"><?= __('Lĩnh Vực') ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>

            <?php foreach ($word->definitions as $definitions): ?>
            <tr>
                <td><?= h($definitions->define) ?></td>
                <td><?= h($definitions->user->namedisplay) ?></td>
                <td><?= h($definitions->contribute) ?></td>
                <td><?= h($definitions->category->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Chi Tiết'), ['controller' => 'Definitions', 'action' => 'view', $definitions->id]) ?>
                    <?= $this->Html->link(__('Sửa'), ['controller' => 'Definitions', 'action' => 'edit', $definitions->id]) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['controller' => 'Definitions', 'action' => 'delete', $definitions->id], ['confirm' => __('Bạn Có Muốn Xóa Không ?', $definitions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Nghĩa Liên Quan') ?></h4>
        <?php if (!empty($word->means)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Nghĩa') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Đóng Góp') ?></th>
                <th scope="col"><?= __('Lĩnh Vực') ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
            <?php foreach ($word->means as $means): ?>
            <tr>
                <td><?= h($means->mean) ?></td>
                <td><?= h($means->user->namedisplay) ?></td>
                <td><?= h($means->contribute) ?></td>
                <td><?= h($means->category->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Chi Tiết'), ['controller' => 'Means', 'action' => 'view', $means->id]) ?>
                    <?= $this->Html->link(__('Sửa'), ['controller' => 'Means', 'action' => 'edit', $means->id]) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['controller' => 'Means', 'action' => 'delete', $means->id], ['confirm' => __('Bạn Có Muốn Xóa Không ?', $means->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
