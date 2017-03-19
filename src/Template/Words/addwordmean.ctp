
<script>
    $i=0;
    function addmean(){
        $i++;
        $('#addmeans').append(`
            <div id="mean`+$i+`">
            <?= $this->Form->input('mean',['class'=>'form-control mean_text','name'=>"mean0",'style'=>'resize:none;','label'=>'Nghĩa thuật ngữ','type'=>'textarea'])?>
            <?= $this->Form->input('cate_mean',['options'=>$catelist,'name'=>'cate0','class'=>'form-control cate_id','label'=>'Lĩnh vực'])?> 
            </div>`
            );
        $id = "#mean"+$i;
        $($id).find(".cate_id" ).attr("name","mean_cate_"+$i+"");
        $($id).find(".mean_text" ).attr("name","mean_"+$i);
        } 
    function adddefi(){
        $i++;
        $('#adddefines').append(`
            <div id="defi`+$i+`">
                        <?= $this->Form->input('defi_0',['class'=>'form-control defi_text','name'=>"defi_0",'style'=>'resize:none;','label'=>'Định nghĩa thuật ngữ','type'=>'textarea'])?>
                        <?= $this->Form->input('defi_cate_0',['options'=>$catelist,'name'=>'defi_cate_0','class'=>'form-control cate_id','label'=>'Lĩnh vực'])?>
                    </div>`
            );
        $id = "#defi"+$i;
        $($id).find(".cate_id" ).attr("name","defi_cate_"+$i+"");
        $($id).find(".defi_text" ).attr("name","defi_"+$i);
        }    
</script>

<div class="large-9 medium-8 columns content">
    <?= $this->Form->create($word) ?>
        <div class="form-group">
        <div class="col-md-12">
        <?= $this->Form->input('word',['class'=>'form-control','label'=>'Thuật ngữ'])?>
        </div>        
        <div class="meanadd col-md-6">
            <div id="addmeans">
                <div id="mean0">
                    <?= $this->Form->input('mean',['class'=>'form-control','name'=>"mean_0",'style'=>'resize:none;','label'=>'Nghĩa thuật ngữ','type'=>'textarea'])?>
                    <?= $this->Form->input('cate_mean',['options'=>$catelist,'name'=>'mean_cate_0','class'=>'form-control','label'=>'Lĩnh vực'])?>	
                </div>
            </div>
            <div lass="definitionadd col-md-12" onclick="toBottom()">           
            <input type="button" name="" onclick="addmean()" value="Thêm nghĩa"  class="btn btn-info" style="margin-top:10px;" />
            </div>    
        </div>
        <div class="definitionadd col-md-6">
            <div id="adddefines">
                    <div id="mean0">
                        <?= $this->Form->input('defi_0',['class'=>'form-control','name'=>"defi_0",'style'=>'resize:none;','label'=>'Định nghĩa thuật ngữ','type'=>'textarea'])?>
                		<?= $this->Form->input('defi_cate_0',['options'=>$catelist,'name'=>'defi_cate_0','class'=>'form-control','label'=>'Lĩnh vực'])?>
                    </div>
            </div>
            <div lass="definitionadd col-md-12" onclick="toBottom()">           
            <input type="button" name="" onclick="adddefi()" value="Thêm định nghĩa" class="btn btn-info" style="margin-top:10px;"/>
            </div>
        </div>
    <div class="col-md-12">   
     <?= $this->Form->button(__('Đóng góp'),['class'=>'btn btn-success','style'=>'margin:20px 0px 0px 0px;']) ?>
</div>
    <?= $this->Form->end() ?>
</div>
