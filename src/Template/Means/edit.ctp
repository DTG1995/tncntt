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
                ['action' => 'delete', $mean->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mean->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Means'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="means form large-9 medium-8 columns content">
    <?= $this->Form->create($mean) ?>
    <fieldset>
        <legend><?= __('Edit Mean') ?></legend>
        <?php
            echo $this->Form->input('WORD_ID', ['options' => $words]);
            echo $this->Form->input('MEAN');
            echo $this->Form->input('CONTRIBUTE');
            echo $this->Form->input('USER_ID');
            echo $this->Form->input('IDCATE');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
