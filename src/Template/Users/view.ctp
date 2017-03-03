<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $user->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NAMEDISPLAY') ?></th>
            <td><?= h($user->NAMEDISPLAY) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($user->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('STATUS') ?></th>
            <td><?= $this->Number->format($user->STATUS) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CREATED') ?></th>
            <td><?= h($user->CREATED) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LAST LOGIN') ?></th>
            <td><?= h($user->LAST_LOGIN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ISADMIN') ?></th>
            <td><?= $user->ISADMIN ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ACTIVE') ?></th>
            <td><?= $user->ACTIVE ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($user->password)); ?>
    </div>
</div>
