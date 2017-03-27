<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<?=$this->Html->css('mylayout/notifications')?>
<?=$this->Html->script('my-js/notification')?>
<div class="row word">
    <h3 class="col-md-2"><b>Thuật ngữ:</b></h3> 
    <h3 class="col-md-8"><?=$word->word?></h3> 
</div>

<?php
switch($notifi->cate)
{
    case 'word':
?>
<div class="row">
    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Định nghĩa</th>
                    <th>Đánh giá</th>
                    <th>Lĩnh vực</th>
                    <th>Trạng thái</th>
                <tr>
            <thead>
            <tbody>
                <?php $i=1;
                foreach($word->definitions as $define)
                {
                    $urlcontribute = $this->Url->build(['controller'=>'definitions','action'=>'setcontribute',$define->id]);
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$define->define?></td>
                    <td><input type="number" onkeyup="define_contribute('<?=$urlcontribute?>',event,this.value)" value ='<?=$define->contribute?>'></td>
                    <td><?=$define->category->name?></td>
                    <td>
                        <input type="checkbox" <?=$define->active?'checked':''?>
                            onchange="active_define('<?=$this->Url->build(['controller'=>'definitions','action'=>'active',$define->id])?>')"
                             data-toggle="toggle" data-size="mini"
                              data-onstyle="success" >
                    </td>
                </tr>
                <?php  
                $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nghĩa</th>
                <th>Đánh giá</th>
                <th>Lĩnh vực</th>
                <th>Trạng thái</th>
            </tr>
        <thead>
        <tbody>
            <?php $i=1;
                foreach($word->means as $mean)
                {
                    $urlcontribute = $this->Url->build(['controller'=>'means','action'=>'setcontribute',$mean->id]);
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$mean->mean?></td>
                    <td><input type="number" onkeyup="mean_contribute('<?=$urlcontribute?>',event,this.value)" value ='<?=$mean->contribute?>'></td>
                    <td><?=$mean->category->name?></td>
                    <td>
                        <input type="checkbox" <?=$mean->active?'checked':''?>
                            onchange="active_mean('<?=$this->Url->build(['controller'=>'means','action'=>'active',$mean->id])?>')"
                             data-toggle="toggle" data-size="mini"
                              data-onstyle="success" >
                    </td>
                </tr>
                <?php 
                $i++;
                }
                ?>
        <tbody>
        </table>
    </div>
</div>
<?php
    break;
    case 'mean':
?>
    <div class="row">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nghĩa</th>
                <th>Đánh giá</th>
                <th>Lĩnh vực</th>
                <th>Trạng thái</th>
            </tr>
        <thead>
        <tbody>
            <?php $i=1;
                foreach($word->means as $mean)
                {
                    $urlcontribute = $this->Url->build(['controller'=>'means','action'=>'setcontribute',$mean->id]);
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$mean->mean?></td>
                    <td><input type="number" onkeyup="mean_contribute('<?=$urlcontribute?>',event,this.value)" value ='<?=$mean->contribute?>'></td>
                    <td><?=$mean->category->name?></td>
                    <td>
                        <input type="checkbox" <?=$mean->active?'checked':''?>
                            onchange="active_mean('<?=$this->Url->build(['controller'=>'means','action'=>'active',$mean->id])?>')"
                             data-toggle="toggle" data-size="mini"
                              data-onstyle="success" >
                    </td>
                </tr>
                <?php 
                $i++;
                }
                ?>
        <tbody>
        </table>
    </div>
<?php
    break;
    case 'define':
?>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Định nghĩa</th>
                    <th>Đánh giá</th>
                    <th>Lĩnh vực</th>
                    <th>Trạng thái</th>
                <tr>
            <thead>
            <tbody>
                <?php $i=1;
                foreach($word->definitions as $define)
                {
                    $urlcontribute = $this->Url->build(['controller'=>'definitions','action'=>'setcontribute',$define->id]);
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$define->define?></td>
                    <td><input type="number" onkeyup="define_contribute('<?=$urlcontribute?>',event,this.value)" value ='<?=$define->contribute?>'></td>
                    <td><?=$define->category->name?></td>
                    <td>
                        <input type="checkbox" <?=$define->active?'checked':''?>
                            onchange="active_define('<?=$this->Url->build(['controller'=>'definitions','action'=>'active',$define->id])?>')"
                             data-toggle="toggle" data-size="mini"
                              data-onstyle="success" >
                    </td>
                </tr>
                <?php  
                $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
    break;
}
?>
