<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mean'), ['action' => 'edit', $mean->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mean'), ['action' => 'delete', $mean->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $mean->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Means'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mean'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['controller' => 'Commentmeans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentmean'), ['controller' => 'Commentmeans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Likemeans'), ['controller' => 'Likemeans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Likemean'), ['controller' => 'Likemeans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="means view large-9 medium-8 columns content">
    <h3><?= h($mean->MEAN) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mean->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Word Id') ?></th>
            <td><?= $this->Number->format($mean->word_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contribute') ?></th>
            <td><?= $this->Number->format($mean->contribute) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($mean->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category Id') ?></th>
            <td><?= $this->Number->format($mean->category_id) ?></td>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Commentmeans', 'action' => 'view', $commentmeans->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Commentmeans', 'action' => 'edit', $commentmeans->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commentmeans', 'action' => 'delete', $commentmeans->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $commentmeans->ID)]) ?>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Likemeans', 'action' => 'view', $likemeans->IDMEAN]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Likemeans', 'action' => 'edit', $likemeans->IDMEAN]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likemeans', 'action' => 'delete', $likemeans->IDMEAN], ['confirm' => __('Are you sure you want to delete # {0}?', $likemeans->IDMEAN)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
