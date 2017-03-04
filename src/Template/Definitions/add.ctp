<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="definitions form large-9 medium-8 columns content">
    <?= $this->Form->create($definition) ?>
    <fieldset>
        <legend><?= __('Add Definition') ?></legend>
        <?php
            echo $this->Form->input('word_id', ['options' => $words]);
            echo $this->Form->input('define');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('contribute');
            echo $this->Form->input('category_id', ['options' => $categorys]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
