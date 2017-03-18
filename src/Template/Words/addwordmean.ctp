

<div class="large-9 medium-8 columns content">
    <?= $this->Form->create($word) ?>
        <div class="form-group">
        <?= $this->Form->input('word',['class'=>'form-control','label'=>'Thuật ngữ'])?>
        <?= $this->Form->input('mean',['class'=>'form-control','style'=>'resize:none;','label'=>'Nghĩa thuật ngữ','type'=>'textarea'])?>
        <?= $this->Form->input('cate_mean',['options'=>$catelist,'class'=>'form-control','label'=>'Lĩnh vực'])?>
        <?= $this->Form->input('definition',['class'=>'form-control','style'=>'resize:none;','label'=>'Định nghĩa thuật ngữ','type'=>'textarea'])?>
        </div>
    <?= $this->Form->button(__('Thêm'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
