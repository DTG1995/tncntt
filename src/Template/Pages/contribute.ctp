<div class="contain">
    <h4>Danh sách đóng góp của người dùng</h4>
    <div class="col-md-6 contents-contributes">
        <div class="title">Định nghĩa</div>
        <div class="content-contributes">
        <?php
            $i=0;
            foreach($defines as $define){
            
                $url = $this->Url->build(["controller" => "Definitions","action" => "changecontribute",$define->id]);
            ?>
                <div class="contribute-content <?=$i%2==0?'chang':'le'?>" >
                    <div class="content-contribute col-md-11">
                        <p class="define"><?=$define->define?><span class="cate-contribute"><?=$define->cate_name?></span></p>
                        <p class="word"><?=$define->word?></p>
                        <p class="username-contribute"><?=$define->username?><a class="readmore-contribute" data-toggle="collapse" data-target="#readmore-contribute-define-<?=$define->id?>">Xem định nghĩa đầy đủ...</a></p>
                    </div>
                    <div class="contributes col-md-1" id="contribute">
                        <i class="fa fa-chevron-up" onclick="changecontribute('define','<?=$url."/1"?>',<?=$define->id?>);" aria-hidden="true"></i>
                        <p class="contribute" id="define<?=$define->id?>"><?=$define->contribute?></p>
                        <i class="fa fa-chevron-down" onclick="changecontribute('define','<?=$url."/-1"?>',<?=$define->id?>);" aria-hidden="true"></i>
                    </div>
                    <div id="readmore-contribute-define-<?=$define->id?>" class="readmore-contribute-content collapse">
                        <p><q></i><?=$define->define?></q><p>
                    </div>
                    </div>
            <?php
            $i++;
            }
        ?>
        </div>
    </div>
    <?=count($defines)<$count_define?"<div class='readmore btn btn-default'>Xem Thêm...</div>":""?>
</div>
<div class="col-md-6 contents-contributes">
    <div class="title">Nghĩa</div>
    <div class="content-contributes">
        <?php
            $i=0;
            foreach($means as $mean){
                $url = $this->Url->build(["controller" => "Means","action" => "changecontribute",$mean->id]);
            ?>
                <div class="contribute-content <?=$i%2==0?'le':'chang'?>" >
                    <div class="content-contribute col-md-11">
                        <p class="define"><?=$mean->mean?><span class="cate-contribute"><?=$define->cate_name?></span></p>
                        <p class="word"><?=$mean->word?></p>
                        <p class="username-contribute"><?=$mean->username?><a class="readmore-contribute" data-toggle="collapse" data-target="#readmore-contribute-mean-<?=$mean->id?>">Xem nghĩa đầy đủ...</a></p>
                    </div>
                    <div class="contributes col-md-1" id="contribute">
                        <i class="fa fa-chevron-up" onclick="changecontribute('mean','<?=$url."/1"?>',<?=$mean->id?>);" aria-hidden="true"></i>
                        <p class="contribute" id="mean<?=$mean->id?>"><?=$mean->contribute?></p>
                        <i class="fa fa-chevron-down" onclick="changecontribute('mean','<?=$url."/-1"?>',<?=$mean->id?>);" aria-hidden="true"></i>
                    </div>
                    <div id="readmore-contribute-mean-<?=$mean->id?>" class="readmore-contribute-content collapse">
                        <p><q></i><?=$mean->mean?></q><p>
                    </div>
                </div>
            <?php
            $i++;
            }
        ?>
        </div>
    </div>
    <?=count($means)<$count_mean?"<div class='readmore btn btn-default'>Xem Thêm...</div>":""?>
</div>
</div>