<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['controller' => 'Commentdefinitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentdefinition'), ['controller' => 'Commentdefinitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['controller' => 'Commentmeans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentmean'), ['controller' => 'Commentmeans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Definitions'), ['controller' => 'Definitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Definition'), ['controller' => 'Definitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Likedefinitions'), ['controller' => 'Likedefinitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Likedefinition'), ['controller' => 'Likedefinitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Likemeans'), ['controller' => 'Likemeans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Likemean'), ['controller' => 'Likemeans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Means'), ['controller' => 'Means', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mean'), ['controller' => 'Means', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Namedisplay') ?></th>
            <td><?= h($user->namedisplay) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($user->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Login') ?></th>
            <td><?= h($user->last_login) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isadmin') ?></th>
            <td><?= $user->isadmin ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $user->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($user->password)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Commentdefinitions') ?></h4>
        <?php if (!empty($user->commentdefinitions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Commentdefinition Id') ?></th>
                <th scope="col"><?= __('Definition Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->commentdefinitions as $commentdefinitions): ?>
            <tr>
                <td><?= h($commentdefinitions->id) ?></td>
                <td><?= h($commentdefinitions->content) ?></td>
                <td><?= h($commentdefinitions->created) ?></td>
                <td><?= h($commentdefinitions->commentdefinition_id) ?></td>
                <td><?= h($commentdefinitions->definition_id) ?></td>
                <td><?= h($commentdefinitions->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Commentdefinitions', 'action' => 'view', $commentdefinitions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Commentdefinitions', 'action' => 'edit', $commentdefinitions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commentdefinitions', 'action' => 'delete', $commentdefinitions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentdefinitions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Commentmeans') ?></h4>
        <?php if (!empty($user->commentmeans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Commentmean Id') ?></th>
                <th scope="col"><?= __('Mean Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->commentmeans as $commentmeans): ?>
            <tr>
                <td><?= h($commentmeans->id) ?></td>
                <td><?= h($commentmeans->content) ?></td>
                <td><?= h($commentmeans->created) ?></td>
                <td><?= h($commentmeans->commentmean_id) ?></td>
                <td><?= h($commentmeans->mean_id) ?></td>
                <td><?= h($commentmeans->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Commentmeans', 'action' => 'view', $commentmeans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Commentmeans', 'action' => 'edit', $commentmeans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commentmeans', 'action' => 'delete', $commentmeans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentmeans->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Definitions') ?></h4>
        <?php if (!empty($user->definitions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Word Id') ?></th>
                <th scope="col"><?= __('Define') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Contribute') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->definitions as $definitions): ?>
            <tr>
                <td><?= h($definitions->id) ?></td>
                <td><?= h($definitions->word_id) ?></td>
                <td><?= h($definitions->define) ?></td>
                <td><?= h($definitions->user_id) ?></td>
                <td><?= h($definitions->contribute) ?></td>
                <td><?= h($definitions->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Definitions', 'action' => 'view', $definitions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Definitions', 'action' => 'edit', $definitions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Definitions', 'action' => 'delete', $definitions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $definitions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Likedefinitions') ?></h4>
        <?php if (!empty($user->likedefinitions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Definition Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Islike') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->likedefinitions as $likedefinitions): ?>
            <tr>
                <td><?= h($likedefinitions->definition_id) ?></td>
                <td><?= h($likedefinitions->user_id) ?></td>
                <td><?= h($likedefinitions->islike) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Likedefinitions', 'action' => 'view', $likedefinitions->definition_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Likedefinitions', 'action' => 'edit', $likedefinitions->definition_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likedefinitions', 'action' => 'delete', $likedefinitions->definition_id], ['confirm' => __('Are you sure you want to delete # {0}?', $likedefinitions->definition_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Likemeans') ?></h4>
        <?php if (!empty($user->likemeans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Mean Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Islike') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->likemeans as $likemeans): ?>
            <tr>
                <td><?= h($likemeans->mean_id) ?></td>
                <td><?= h($likemeans->user_id) ?></td>
                <td><?= h($likemeans->islike) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Likemeans', 'action' => 'view', $likemeans->mean_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Likemeans', 'action' => 'edit', $likemeans->mean_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likemeans', 'action' => 'delete', $likemeans->mean_id], ['confirm' => __('Are you sure you want to delete # {0}?', $likemeans->mean_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Means') ?></h4>
        <?php if (!empty($user->means)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Word Id') ?></th>
                <th scope="col"><?= __('Mean') ?></th>
                <th scope="col"><?= __('Contribute') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->means as $means): ?>
            <tr>
                <td><?= h($means->id) ?></td>
                <td><?= h($means->word_id) ?></td>
                <td><?= h($means->mean) ?></td>
                <td><?= h($means->contribute) ?></td>
                <td><?= h($means->user_id) ?></td>
                <td><?= h($means->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Means', 'action' => 'view', $means->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Means', 'action' => 'edit', $means->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Means', 'action' => 'delete', $means->id], ['confirm' => __('Are you sure you want to delete # {0}?', $means->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
