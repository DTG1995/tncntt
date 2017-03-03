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
                ['action' => 'delete', $commentdefinition->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $commentdefinition->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Commentdefinitions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="commentdefinitions form large-9 medium-8 columns content">
    <?= $this->Form->create($commentdefinition) ?>
    <fieldset>
        <legend><?= __('Edit Commentdefinition') ?></legend>
        <?php
            echo $this->Form->input('CONTENT');
            echo $this->Form->input('CREATED');
            echo $this->Form->input('COMMENTDEFINITION_ID');
            echo $this->Form->input('DEFINITION_ID');
            echo $this->Form->input('USER_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
