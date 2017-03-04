<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mean->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mean->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Means'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['controller' => 'Commentmeans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Commentmean'), ['controller' => 'Commentmeans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Likemeans'), ['controller' => 'Likemeans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Likemean'), ['controller' => 'Likemeans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="means form large-9 medium-8 columns content">
    <?= $this->Form->create($mean) ?>
    <fieldset>
        <legend><?= __('Edit Mean') ?></legend>
        <?php
            echo $this->Form->control('word_id', ['options' => $words]);
            echo $this->Form->control('mean');
            echo $this->Form->control('contribute');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('category_id', ['options' => $categorys]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
