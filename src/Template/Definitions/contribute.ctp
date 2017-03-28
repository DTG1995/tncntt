
<script>
    $i=0;
    function adddefine(){
        $i++;
        $('#adddefines').append(
        `<div id="define`+$i+`">
                <div class="row categorys">
                    <?=$this->Form->input('category_id', ['options' => $categorys,'class'=>'form-control cate_id','label'=>'Lĩnh vực','name'=>"cate"]);?>
                </div>
                <div class="row define">
                    <?=$this->Form->input('define',['label'=>'Định nghĩa','type'=>'textarea','class'=>'form-control define_text','name'=>'define','style'=>'resize:none;'])?>
                </div>
            </div>`
            );
        $id = "#define"+$i;
        $($id).find(".cate_id" ).attr("name","cate"+$i);
        $($id).find(".define_text" ).attr("name","define"+$i);
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
            <div id='adddefines'> 
                <div id="define">
                    <div class="row categorys">
                        <?=$this->Form->input('category_id', ['options' => $categorys,'class'=>'form-control','label'=>'Lĩnh vực','name'=>'cate0']);?>
                    </div>
                    <div class="row define">
                        <?=$this->Form->input('define',['label'=>'Định nghĩa','type'=>'textarea','class'=>'form-control','name'=>'define0','style'=>'resize:none;'])?>
                    </div>
                </div>
            </div>
            <div>
                <?=$this->Form->submit('Đóng góp',['class'=>'btn btn-success','type'=>'submit','style'=>'float:left;'])?>
                <?=$this->Form->button('Thêm nghĩa',['class'=>'btn btn-default','type'=>'button','style'=>'float:right;','onclick'=>'return adddefine();'])?>
            </div>
        </form>
    </div>
</div>