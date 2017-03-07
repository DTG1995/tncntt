<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Sửa Thông Tin User') ?></legend>
        <?php
            echo $this->Form->input('username',['class'=>'form-control','label'=>'Tên Đăng Nhập']);
            echo $this->Form->input('namedisplay',['class'=>'form-control','label'=>'Tên hiển thị']);
            echo $this->Form->input('password',['class'=>'form-control','label'=>'Mật khẩu']);
            echo $this->Form->input('isadmin');
            echo $this->Form->input('last_login',['class'=>'form-control','label'=>'Đăng nhập lần cuối']);
            echo $this->Form->input('status',['class'=>'form-control','label'=>'Trạng thái']);
            echo $this->Form->input('active',['label'=>'Hoạt động']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sửa'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
