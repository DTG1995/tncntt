<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="means form large-9 medium-8 columns content">
    <?= $this->Form->create($mean) ?>
    <fieldset style="padding-bottom: 20px;">
        <legend><?= __('Thêm Nghĩa Mới') ?></legend>
        <?php
            echo $this->Form->input('word_id', ['options' => $words,'class'=>'form-control']);
            echo $this->Form->input('mean',['class'=>'form-control','style'=>'resize:none;']);
            echo $this->Form->input('contribute',['class'=>'form-control']);
            echo $this->Form->input('user_id', ['options' => $users,'class'=>'form-control']);
            echo $this->Form->input('category_id', ['options' => $categorys,'class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Thêm'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
