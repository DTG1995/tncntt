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
    <h1>Đăng Ký</h1>
    <?php echo $this->Form->create('Accounts',['url' => ['action' => 'login']]);?>
    <form class="login-form">
      <input type="username" placeholder="Tên đăng nhập" name="username"/>
      <input type="password" placeholder="Mật khẩu" name="password" />
        <div class="input buttons">
            <button type="submit" name="data[Accounts][login]" value="login">Đăng nhập</button>
        </div>      
    </form>
    <?= $this->Html->link("Quay lại trang chủ",['controller'=>'pages','action'=>'display'])?>
    <?= $this->Html->link("Đăng ký",['controller'=>'users','action'=>'adduser'])?>
  </div>

</div>
    <?php echo $this->Form->end();?>
</div>
</body>
</html>
