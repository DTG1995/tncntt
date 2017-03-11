<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="categorys form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Sửa Lĩnh Vực') ?></legend>
        <?php
            echo $this->Form->input('name',['class'=>'form-control','label'=>'Tên Lĩnh Vực']);
            echo $this->Form->input('active');
            echo $this->Form->input('contribute',['class'=>'form-control','label'=>'Đóng góp']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sửa'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
