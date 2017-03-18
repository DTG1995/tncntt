<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="large-9 medium-8 columns content">
    <?= $this->Form->create($word) ?>
            <div class="form-group">
        <label for="usr">Nhập Từ Cần Thêm</label>
        <input type="text" class="form-control" name="word">

        </div>
    <?= $this->Form->button(__('Thêm'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

