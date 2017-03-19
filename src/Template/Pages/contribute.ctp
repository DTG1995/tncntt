<div class="contain">
    <h4>Danh sách đóng góp của người dùng</h4>
    <div class="col-md-6 contents-contributes">
        <div class="title">Định nghĩa</div>
        <div class="content-contributes">
        <?php
            $i=0;
            foreach($defines as $define){
            ?>
            <div class="contribute-content <?=$i%2==0?'chang':'le'?>" >
                <div class="content-contribute col-md-11">
                    <p class="define"><?=$define->define?></p>
                    <p class="word"><?=$define->word->word?></p>
                </div>
                <div class="contributes col-md-1" id="contribute">
                    <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    <p class="contribute"><?=$define->contribute?></p>
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                </div>
            </div>
            <?php
            $i++;
            }
        ?>
        </div>
        <div class="readmore btn btn-default">Xem Thêm...</div>
    </div>
    <div class="col-md-6 contents-contributes">
        <div class="title">Nghĩa</div>
        <div class="content-contributes">
        <?php
            $i=0;
            foreach($means as $mean){
            ?>
            <div class="contribute-content <?=$i%2==0?'chang':'le'?>" >
                <div class="content-contribute col-md-11">
                    <p class="define"><?=$mean->mean?></p>
                    <p class="word"><?=$mean->word->word?></p>
                </div>
                <div class="contributes col-md-1" id="contribute">
                    <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    <p class="contribute"><?=$mean->contribute?></p>
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                </div>
            </div>
            <?php
            $i++;
            }
        ?>
        </div>
        <div class="readmore btn btn-default">Xem Thêm...</div>
    </div>
</div>