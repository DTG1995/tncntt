<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="words form large-9 medium-8 columns content">
    <?= $this->Form->create($word) ?>
    <fieldset>
        <legend><?= __('Sửa Thuật Ngữ') ?></legend>
        <?php
            echo $this->Form->input('word',['class'=>'form-control','label'=>'Thuật Ngữ']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sửa'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
