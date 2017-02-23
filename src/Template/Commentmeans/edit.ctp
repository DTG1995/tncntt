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
                ['action' => 'delete', $commentmean->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $commentmean->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Commentmeans'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="commentmeans form large-9 medium-8 columns content">
    <?= $this->Form->create($commentmean) ?>
    <fieldset>
        <legend><?= __('Edit Commentmean') ?></legend>
        <?php
            echo $this->Form->input('CONTENT');
            echo $this->Form->input('CREATED');
            echo $this->Form->input('IDPARENT');
            echo $this->Form->input('IDMEANS');
            echo $this->Form->input('EMAIL');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
