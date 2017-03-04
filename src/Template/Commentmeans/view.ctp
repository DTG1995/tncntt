<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Commentmean'), ['action' => 'edit', $commentmean->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Commentmean'), ['action' => 'delete', $commentmean->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentmean->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentmean'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Means'), ['controller' => 'Means', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mean'), ['controller' => 'Means', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['controller' => 'Commentmeans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentmean'), ['controller' => 'Commentmeans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="commentmeans view large-9 medium-8 columns content">
    <h3><?= h($commentmean->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mean') ?></th>
            <td><?= $commentmean->has('mean') ? $this->Html->link($commentmean->mean->id, ['controller' => 'Means', 'action' => 'view', $commentmean->mean->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $commentmean->has('user') ? $this->Html->link($commentmean->user->id, ['controller' => 'Users', 'action' => 'view', $commentmean->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($commentmean->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Commentmean Id') ?></th>
            <td><?= $this->Number->format($commentmean->commentmean_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($commentmean->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($commentmean->content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Commentmeans') ?></h4>
        <?php if (!empty($commentmean->commentmeans)): ?>
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
            <?php foreach ($commentmean->commentmeans as $commentmeans): ?>
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
</div>
