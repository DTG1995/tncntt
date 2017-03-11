<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="definitions form large-9 medium-8 columns content">
    <?= $this->Form->create($definition) ?>
    <fieldset style="padding-bottom: 20px;">
        <legend><?= __('Thêm Định Nghĩa') ?></legend>
        <?php
            echo $this->Form->input('word_id',['class'=>'form-control']);
            echo $this->Form->input('define',['class'=>'form-control','style'=>'resize:none;']);
            echo $this->Form->input('user_id',['class'=>'form-control']);
            echo $this->Form->input('contribute',['class'=>'form-control']);
            echo $this->Form->input('category_id', ['options' => $categorys,'class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Thêm'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
