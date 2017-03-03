<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Likemeans'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="likemeans form large-9 medium-8 columns content">
    <?= $this->Form->create($likemean) ?>
    <fieldset>
        <legend><?= __('Add Likemean') ?></legend>
        <?php
            echo $this->Form->input('MEAN_ID');
            echo $this->Form->input('USER_ID');
            echo $this->Form->input('ISLIKE');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
