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
                ['action' => 'delete', $definition->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $definition->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Definitions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="definitions form large-9 medium-8 columns content">
    <?= $this->Form->create($definition) ?>
    <fieldset>
        <legend><?= __('Edit Definition') ?></legend>
        <?php
            echo $this->Form->input('WORDS_ID');
            echo $this->Form->input('DEFINE');
            echo $this->Form->input('USERS_ID');
            echo $this->Form->input('CONTRIBUTE');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
