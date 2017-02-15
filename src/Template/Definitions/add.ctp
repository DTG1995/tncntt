<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Definitions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="definitions form large-9 medium-8 columns content">
    <?= $this->Form->create($definition) ?>
    <fieldset>
        <legend><?= __('Add Definition') ?></legend>
        <?php
            echo $this->Form->input('IDWORD');
            echo $this->Form->input('DEFINE');
            echo $this->Form->input('EMAIL');
            echo $this->Form->input('IDCATE');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
