<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Thêm Người Dùng') ?></legend>
        <?php
            echo $this->Form->input('username',['class'=>'form-control']);
            echo $this->Form->input('namedisplay',['class'=>'form-control']);
            echo $this->Form->input('password',['class'=>'form-control']);
            echo $this->Form->input('isadmin');
            echo $this->Form->input('last_login',['class'=>'form-control']);
            echo $this->Form->input('status',['class'=>'form-control']);
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Thêm'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
