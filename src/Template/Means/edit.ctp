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
                ['action' => 'delete', $mean->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mean->id)]
            )
        ?></li>
    </ul>
</nav>
<div class="means form large-9 medium-8 columns content">
    <?= $this->Form->create($mean) ?>
    <fieldset>
        <legend><?= __('Edit Mean') ?></legend>
        <?php
            echo $this->Form->input('word_id', ['options' => $words]);
            echo $this->Form->input('mean');
            echo $this->Form->input('contribute');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('category_id', ['options' => $categorys]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
