<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mean'), ['action' => 'edit', $mean->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mean'), ['action' => 'delete', $mean->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mean->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Means'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mean'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['controller' => 'Commentmeans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentmean'), ['controller' => 'Commentmeans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Likemeans'), ['controller' => 'Likemeans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Likemean'), ['controller' => 'Likemeans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="means view large-9 medium-8 columns content">
    <h3><?= h($mean->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Word') ?></th>
            <td><?= $mean->has('word') ? $this->Html->link($mean->word->id, ['controller' => 'Words', 'action' => 'view', $mean->word->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $mean->has('user') ? $this->Html->link($mean->user->id, ['controller' => 'Users', 'action' => 'view', $mean->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $mean->has('category') ? $this->Html->link($mean->category->name, ['controller' => 'Categorys', 'action' => 'view', $mean->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mean->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contribute') ?></th>
            <td><?= $this->Number->format($mean->contribute) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Mean') ?></h4>
        <?= $this->Text->autoParagraph(h($mean->mean)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Commentmeans') ?></h4>
        <?php if (!empty($mean->commentmeans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Commentmean Id') ?></th>
                <th scope="col"><?= __('Mean Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mean->commentmeans as $commentmeans): ?>
            <tr>
                <td><?= h($commentmeans->id) ?></td>
                <td><?= h($commentmeans->content) ?></td>
                <td><?= h($commentmeans->created) ?></td>
                <td><?= h($commentmeans->commentmean_id) ?></td>
                <td><?= h($commentmeans->mean_id) ?></td>
                <td><?= h($commentmeans->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Commentmeans', 'action' => 'view', $commentmeans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Commentmeans', 'action' => 'edit', $commentmeans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commentmeans', 'action' => 'delete', $commentmeans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentmeans->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Likemeans') ?></h4>
        <?php if (!empty($mean->likemeans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Mean Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Islike') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mean->likemeans as $likemeans): ?>
            <tr>
                <td><?= h($likemeans->mean_id) ?></td>
                <td><?= h($likemeans->user_id) ?></td>
                <td><?= h($likemeans->islike) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Likemeans', 'action' => 'view', $likemeans->mean_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Likemeans', 'action' => 'edit', $likemeans->mean_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likemeans', 'action' => 'delete', $likemeans->mean_id], ['confirm' => __('Are you sure you want to delete # {0}?', $likemeans->mean_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
