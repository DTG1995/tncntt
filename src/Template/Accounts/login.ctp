<div class="row contain">
    <div class="login">
        <?php echo $this->Form->create('Accounts',['url' => ['action' => 'login']]);?>
        <fieldset>
            <legend>Enter Your Username and Password</legend>
            <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            ?>
            <div class="input buttons">
                <button type="submit" name="data[Accounts][login]" value="login">Login</button>
            </div>
        </fieldset>
    <?php echo $this->Form->end();?>
</div>
<div>