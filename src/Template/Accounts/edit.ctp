<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $account->EMAIL],
                ['confirm' => __('Are you sure you want to delete # {0}?', $account->EMAIL)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="accounts form large-9 medium-8 columns content">
    <?= $this->Form->create($account) ?>
    <fieldset>
        <legend><?= __('Edit Account') ?></legend>
        <?php
            echo $this->Form->input('ID');
            echo $this->Form->input('NAMEDISPLAY');
            echo $this->Form->input('PASSWORD');
            echo $this->Form->input('ISADMIN');
            echo $this->Form->input('CREATED');
            echo $this->Form->input('LAST_LOGIN');
            echo $this->Form->input('STATUS');
            echo $this->Form->input('ACTIVE');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
