<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="categorys form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Add Category') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('active');
            echo $this->Form->input('contribute');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
