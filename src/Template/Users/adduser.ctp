<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
        <legend><?= __('Đăng ký thành viên') ?></legend>
        <?php
            echo $this->Form->input('username',['label'=>'Tên đăng nhập','class'=>'form-control']);
            echo $this->Form->input('namedisplay',['label'=>'Tên hiển thị','class'=>'form-control']);
            echo $this->Form->input('password',['label'=>'Mật khẩu','class'=>'form-control']);
        ?>
    <?= $this->Form->button(__('Đăng ký'),['class'=>'btn btn-success','style'=>['float:right']]) ?>
    <?= $this->Form->end() ?>
</div>
