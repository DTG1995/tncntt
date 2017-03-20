
<script>
    $i=0;
    function addmean(){
        $i++;
        $('#addmeans').append(
        `<div id="mean`+$i+`">
                <div class="row categorys">
                    <?=$this->Form->input('category_id', ['options' => $categorys,'class'=>'form-control cate_id','label'=>'Lĩnh vực','name'=>"cate"]);?>
                </div>
                <div class="row mean">
                    <?=$this->Form->input('mean',['label'=>'Nghĩa','type'=>'textarea','class'=>'form-control mean_text','name'=>'mean','style'=>'resize:none;'])?>
                </div>
            </div>`
            );
        $id = "#mean"+$i;
        $($id).find(".cate_id" ).attr("name","cate"+$i);
        $($id).find(".mean_text" ).attr("name","mean"+$i);
        toBottom();
        }   
</script>


<div class="col-md-6 col-md-offset-3">
    <?php
    ?>
    <div class="row">
        <h1>Từ: <?=$word?></h1>
    </div>
    <div class="form-group">
        <form method="post">
            <div id='addmeans'> 
                <div id="mean">
                    <div class="row categorys">
                        <?=$this->Form->input('category_id', ['options' => $categorys,'class'=>'form-control','label'=>'Lĩnh vực','name'=>'cate0']);?>
                    </div>
                    <div class="row mean">
                        <?=$this->Form->input('mean',['label'=>'Nghĩa','type'=>'textarea','class'=>'form-control','name'=>'mean0','style'=>'resize:none;'])?>
                    </div>
                </div>
            </div>
            <div >
                <?=$this->Form->submit('Đóng góp',['class'=>'btn btn-success','type'=>'submit','style'=>'float:left;margin-top:10px;'])?>
                <?=$this->Form->button('Thêm nghĩa',['class'=>'btn btn-default','type'=>'button','style'=>'float:right;margin-top:10px;','onclick'=>'return addmean();'])?>
            </div>
        </form>
    </div>
</div>