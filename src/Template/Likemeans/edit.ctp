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
                ['action' => 'delete', $likemean->IDMEAN],
                ['confirm' => __('Are you sure you want to delete # {0}?', $likemean->IDMEAN)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Likemeans'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="likemeans form large-9 medium-8 columns content">
    <?= $this->Form->create($likemean) ?>
    <fieldset>
        <legend><?= __('Edit Likemean') ?></legend>
        <?php
            echo $this->Form->input('ISLIKE');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
