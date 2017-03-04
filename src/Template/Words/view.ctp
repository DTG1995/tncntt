<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Word'), ['action' => 'edit', $word->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Word'), ['action' => 'delete', $word->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $word->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Means'), ['controller' => 'Means', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mean'), ['controller' => 'Means', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Definitions'), ['controller' => 'Definitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Definition'), ['controller' => 'Definitions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="words view large-9 medium-8 columns content">
    <h3><?= h($word->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Word') ?></th>
            <td><?= h($word->word) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($word->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Means') ?></h4>
        <?php if (!empty($word->means)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Word Id') ?></th>
                <th scope="col"><?= __('Mean') ?></th>
                <th scope="col"><?= __('Contribute') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($word->means as $means): ?>
            <tr>
                <td><?= h($means->id) ?></td>
                <td><?= h($means->word_id) ?></td>
                <td><?= h($means->mean) ?></td>
                <td><?= h($means->contribute) ?></td>
                <td><?= h($means->user_id) ?></td>
                <td><?= h($means->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Means', 'action' => 'view', $means->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Means', 'action' => 'edit', $means->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Means', 'action' => 'delete', $means->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $means->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Definitions') ?></h4>
        <?php if (!empty($word->definitions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Word Id') ?></th>
                <th scope="col"><?= __('Define') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Contribute') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($word->definitions as $definitions): ?>
            <tr>
                <td><?= h($definitions->id) ?></td>
                <td><?= h($definitions->word_id) ?></td>
                <td><?= h($definitions->define) ?></td>
                <td><?= h($definitions->user_id) ?></td>
                <td><?= h($definitions->contribute) ?></td>
                <td><?= h($definitions->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Definitions', 'action' => 'view', $definitions->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Definitions', 'action' => 'edit', $definitions->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Definitions', 'action' => 'delete', $definitions->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $definitions->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
