<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Means'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="means form large-9 medium-8 columns content">
    <?= $this->Form->create($mean) ?>
    <fieldset>
        <legend><?= __('Add Mean') ?></legend>
        <?php
            echo $this->Form->input('IDWORD');
            echo $this->Form->input('MEAN');
            echo $this->Form->input('CONTRIBUTE');
            echo $this->Form->input('EMAIL');
            echo $this->Form->input('IDCATE');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
