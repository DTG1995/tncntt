<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="means form large-9 medium-8 columns content">
    <?= $this->Form->create($mean) ?>
    <fieldset>
        <legend><?= __('Add Mean') ?></legend>
        <?php
            echo $this->Form->input('word_id', ['options' => $words]);
            echo $this->Form->input('mean');
            echo $this->Form->input('contribute');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('category_id', ['options' => $categorys]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
