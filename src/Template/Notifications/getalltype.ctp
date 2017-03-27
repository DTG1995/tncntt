<?php 
if($type=='contribute')
{?>
    <script>
        height_contribute = (<?=$contributes->count()?>*70+77)+"px";
        $("#content-contribute").css("height",height_contribute);
    </script>
    <li>
        <div class="notification_header">
            <h3>Có <span class="count_contribute"> 0</span> đóng góp mới</h3>
        </div>
    </li>
    <?php foreach($contributes as $contribute)
    {
        $text = "
                <div class='notification_desc'>
                    <p>".$contribute->content."</p>
                    <p><span>".$contribute->created->timeAgoInWords( array(
                            'end' => '+10 year',
                            'format' => 'F jS, Y',
                            'accuracy' => array('second' => 'second')
                        )
                    )."</span></p>
                    </div>
                <div class='clearfix'></div> ";
        $div = $this->Html->div(null, $text, array('id' => 'notescover'));
    ?>
    <li class='<?=$contribute->seen?'notification-seen':''?>'>
        <?=$this->Html->link($div,['controller'=>'Notifications','action'=>'view',$contribute->id],['escape' => false]);?>
    </li>
    <?php
    }
    ?>
    <li>
        <div class="notification_bottom">
            <?=$this->Html->link('Xem tất cả các đóng góp',['controller'=>'Notifications','action'=>'index','add'],['escape' => false]);?>
        </div> 
    </li>
<?php
}else{
    ?>
    <script>
        height_warning = (<?=$warnings->count()?>*70+77)+"px";
        $("#content-warnings").css("height",height_warning);
    </script>
    <li>
        <div class="notification_header">
            <h3>Có <span class="count_warning">0</span> cảnh báo mới</h3>
        </div>
    </li>
    <?php foreach($warnings as $warning)
    {
        $text = "
                <div class='notification_desc'>
                    <p>".$warning->content."</p>
                    <p><span>".$warning->created->timeAgoInWords( array(
                            'end' => '+10 year',
                            'format' => 'F jS, Y',
                            'accuracy' => array('second' => 'second')
                        )
                    )."</span></p>
                    </div>
                <div class='clearfix'></div> ";
        $div = $this->Html->div(null, $text, array('id' => 'notescover'));
    ?>
    <li class='<?=$warning->seen?'notification-seen':''?>'>
        <?=$this->Html->link($div,['controller'=>'Notifications','action'=>'view',$warning->id],['escape' => false]);?>
    </li>
    <?php
    }
    ?>
        <li>
        <div class="notification_bottom">
            <?=$this->Html->link('Xem tất cả các đóng góp',['controller'=>'Notifications','action'=>'index','warning'],['escape' => false]);?>
        </div> 
    </li>
    <?php
}
?>