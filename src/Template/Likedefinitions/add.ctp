<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Likedefinitions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="likedefinitions form large-9 medium-8 columns content">
    <?= $this->Form->create($likedefinition) ?>
    <fieldset>
        <legend><?= __('Add Likedefinition') ?></legend>
        <?php
            echo $this->Form->input('DEFINITION_ID');
            echo $this->Form->input('USER_ID');
            echo $this->Form->input('ISLIKE');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
