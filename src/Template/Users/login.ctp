<?php
$this->layout=null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng Nhập</title>

    <?= $this->Html->css('login.css')?>

</head>
<body>
<div class="row contain">
<div class="login-page">
  <div class="form">
  <?= $this->Form->create() ?>
 
  		 <?= __('Nhập Tên Đăng Nhập Và Mật Khẩu') ?>

    	<input type="username" placeholder="Enter your Email" name="username"/>
      <input type="password" placeholder="Enter your Password" name="password" />
        <div class="input buttons">
            <button type="submit" name="data[Accounts][login]" value="login">Login</button>
        </div>      
  </div>
  <?php echo $this->Form->end();?>
</div>
    
</div>
</body>
</html>
