
<?php
$this->layout=null;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>

    <?= $this->Html->css('login.css')?>

</head>
<body>
<div class="row contain">
<div class="login-page">
  <div class="form">
    <h1>Đăng nhập</h1>
    <?= $this->Form->create($user) ?>
    <form class="login-form">
        <?php
            echo $this->Form->input('username',['label'=>'Tên đăng nhập','class'=>'form-control']);
            echo $this->Form->input('namedisplay',['label'=>'Tên hiển thị','class'=>'form-control']);
            echo $this->Form->input('password',['label'=>'Mật khẩu','class'=>'form-control']);
        ?>
    <?= $this->Form->button(__('Đăng ký'),['class'=>'btn btn-success','style'=>['float:right']]) ?>  
    </form>
    <?= $this->Html->link("Quay lại trang chủ",['controller'=>'pages','action'=>'display'])?>
  </div>

</div>
    <?php echo $this->Form->end();?>
</div>
</body>
</html>
