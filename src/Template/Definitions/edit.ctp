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
                ['action' => 'delete', $definition->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $definition->id)]
            )
        ?></li>

    </ul>
</nav>

<div class="definitions form large-9 medium-8 columns content">
    <?= $this->Form->create($definition) ?>
    <fieldset style="padding-bottom: 20px;">
        <legend><?= __('Sửa Định Nghĩa') ?></legend>
        <?php
            echo $this->Form->input('word_id', ['options' => $words,'class'=>'form-control']);
            echo $this->Form->input('define',['class'=>'form-control','style'=>'resize:none;']);
            echo $this->Form->input('user_id', ['options' => $users,'class'=>'form-control']);
            echo $this->Form->input('contribute',['class'=>'form-control']);
            echo $this->Form->input('category_id', ['options' => $categorys,'class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sửa'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
