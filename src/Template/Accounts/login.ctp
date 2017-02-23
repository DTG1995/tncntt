<?php
$this->layout=null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <?= $this->Html->css('login.css')?>

</head>
<body>
<div class="row contain">
<div class="login-page">
  <div class="form">
    <?php echo $this->Form->create('Accounts',['url' => ['action' => 'login']]);?>
    <form class="login-form">
      <input type="email" placeholder="Enter your Email" name="email"/>
      <input type="password" placeholder="Enter your Password" name="password" />
        <div class="input buttons">
            <button type="submit" name="data[Accounts][login]" value="login">Login</button>
        </div>      
    </form>
  </div>
</div>
    <?php echo $this->Form->end();?>
</div>
</body>
</html>
