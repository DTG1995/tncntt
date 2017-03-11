<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="categorys form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Lĩnh Vực') ?></legend>
    <label for="name">Tên Lĩnh Vực</label>

    <input type="text" name="name" required="required" maxlength="100" id="name" class="form-control">

    <label for="name">Đóng Góp</label>

    <input type="number" name="contribute" required="required" id="contribute" class="form-control">
    
    <input type="hidden" name="active" value="0">
    <label for="active"><input type="checkbox" name="active" value="1" id="active">Active</label>
</div>
    </fieldset>
    <?= $this->Form->button(__('Thêm'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
