<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Definition'), ['action' => 'edit', $definition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Definition'), ['action' => 'delete', $definition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $definition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Definitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Definition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['controller' => 'Commentdefinitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentdefinition'), ['controller' => 'Commentdefinitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Likedefinitions'), ['controller' => 'Likedefinitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Likedefinition'), ['controller' => 'Likedefinitions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="definitions view large-9 medium-8 columns content">
    <h3><?= h($definition->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Word') ?></th>
            <td><?= $definition->has('word') ? $this->Html->link($definition->word->id, ['controller' => 'Words', 'action' => 'view', $definition->word->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $definition->has('user') ? $this->Html->link($definition->user->id, ['controller' => 'Users', 'action' => 'view', $definition->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $definition->has('category') ? $this->Html->link($definition->category->name, ['controller' => 'Categorys', 'action' => 'view', $definition->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($definition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contribute') ?></th>
            <td><?= $this->Number->format($definition->contribute) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Define') ?></h4>
        <?= $this->Text->autoParagraph(h($definition->define)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Commentdefinitions') ?></h4>
        <?php if (!empty($definition->commentdefinitions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Commentdefinition Id') ?></th>
                <th scope="col"><?= __('Definition Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($definition->commentdefinitions as $commentdefinitions): ?>
            <tr>
                <td><?= h($commentdefinitions->id) ?></td>
                <td><?= h($commentdefinitions->content) ?></td>
                <td><?= h($commentdefinitions->created) ?></td>
                <td><?= h($commentdefinitions->commentdefinition_id) ?></td>
                <td><?= h($commentdefinitions->definition_id) ?></td>
                <td><?= h($commentdefinitions->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Commentdefinitions', 'action' => 'view', $commentdefinitions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Commentdefinitions', 'action' => 'edit', $commentdefinitions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commentdefinitions', 'action' => 'delete', $commentdefinitions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentdefinitions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Likedefinitions') ?></h4>
        <?php if (!empty($definition->likedefinitions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Definition Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Islike') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($definition->likedefinitions as $likedefinitions): ?>
            <tr>
                <td><?= h($likedefinitions->definition_id) ?></td>
                <td><?= h($likedefinitions->user_id) ?></td>
                <td><?= h($likedefinitions->islike) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Likedefinitions', 'action' => 'view', $likedefinitions->definition_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Likedefinitions', 'action' => 'edit', $likedefinitions->definition_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likedefinitions', 'action' => 'delete', $likedefinitions->definition_id], ['confirm' => __('Are you sure you want to delete # {0}?', $likedefinitions->definition_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
