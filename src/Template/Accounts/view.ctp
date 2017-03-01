<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Account'), ['action' => 'edit', $account->EMAIL]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Account'), ['action' => 'delete', $account->EMAIL], ['confirm' => __('Are you sure you want to delete # {0}?', $account->EMAIL)]) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accounts view large-9 medium-8 columns content">
    <h3><?= h($account->EMAIL) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('EMAIL') ?></th>
            <td><?= h($account->EMAIL) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NAMEDISPLAY') ?></th>
            <td><?= h($account->NAMEDISPLAY) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($account->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('STATUS') ?></th>
            <td><?= $this->Number->format($account->STATUS) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CREATED') ?></th>
            <td><?= h($account->CREATED) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LAST LOGIN') ?></th>
            <td><?= h($account->LAST_LOGIN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ISADMIN') ?></th>
            <td><?= $account->ISADMIN ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ACTIVE') ?></th>
            <td><?= $account->ACTIVE ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('PASSWORD') ?></h4>
        <?= $this->Text->autoParagraph(h($account->PASSWORD)); ?>
    </div>
</div>
