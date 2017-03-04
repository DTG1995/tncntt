<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="words form large-9 medium-8 columns content">
    <?= $this->Form->create($word) ?>
    <fieldset>
        <legend><?= __('Add Word') ?></legend>
        <?php
             echo $this->Form->input('word');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
