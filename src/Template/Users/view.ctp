<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users view large-9 medium-8 columns content">
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('Tên Đăng Nhập') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tên hiển thị') ?></th>
            <td><?= h($user->namedisplay) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Trạng thái') ?></th>
            <td><?= $this->Number->format($user->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thời gian') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Đăng nhập lần cuối') ?></th>
            <td><?= h($user->last_login) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isadmin') ?></th>
            <td><?= $user->isadmin ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hoạt Động') ?></th>
            <td><?= $user->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Bình luận liên quan đến định nghĩa') ?></h4>
        <?php if (!empty($user->commentdefinitions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Nội dung') ?></th>
                <th scope="col"><?= __('Thời gian') ?></th>
                <th scope="col"><?= __('Định nghĩa') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col" class="actions"><?= __('Hành động') ?></th>
            </tr>
            <?php foreach ($user->commentdefinitions as $commentdefinitions): ?>
            <tr>
                <td><?= h($commentdefinitions->content) ?></td>
                <td><?= h($commentdefinitions->created) ?></td>
                <td><?= h($commentdefinitions->definition->define) ?></td>
                <td><?= h($commentdefinitions->user->namedisplay) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>',['action'   => 'delete',$commentdefinitions->id],['escape'   => false,'title'=>'xóa','confirm' => __('Bạn Có Muốn Xóa Không?', $commentdefinitions->id)]);
                    ?>
        
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Bình luận liên quan đến nghĩa') ?></h4>
        <?php if (!empty($user->commentmeans)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Nội dung') ?></th>
                <th scope="col"><?= __('Thời gian') ?></th>
                <th scope="col"><?= __('Nghĩa') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col" class="actions"><?= __('Hành Động') ?></th>
            </tr>
            <?php foreach ($user->commentmeans as $commentmeans): ?>
            <tr>
                <td><?= h($commentmeans->content) ?></td>
                <td><?= h($commentmeans->created) ?></td>
                <td><?= h($commentmeans->mean->mean) ?></td>
                <td><?= h($commentmeans->user->namedisplay) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>',['action'   => 'delete',$commentmeans->id],['escape'   => false,'title'=>'xóa','confirm' => __('Bạn Có Muốn Xóa Không?', $commentmeans->id)]);
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Định nghĩa liên quan') ?></h4>
        <?php if (!empty($user->definitions)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Thuật ngữ') ?></th>
                <th scope="col"><?= __('Định nghĩa') ?></th>
                <th scope="col"><?= __('User ') ?></th>
                <th scope="col"><?= __('Đóng góp') ?></th>
                <th scope="col"><?= __('Lĩnh vực') ?></th>
                <th scope="col" class="actions"><?= __('Hành động') ?></th>
            </tr>
            <?php foreach ($user->definitions as $definitions): ?>
            <tr>
                <td><?= h($definitions->word->word) ?></td>
                <td><?= h($definitions->define) ?></td>
                <td><?= h($definitions->user->namedisplay) ?></td>
                <td><?= h($definitions->contribute) ?></td>
                <td><?= h($definitions->category->name) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>',['action'   => 'delete',$definitions->id],['escape'   => false,'title'=>'xóa','confirm' => __('Bạn Có Muốn Xóa Không?', $definitions->id)]);
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Like định nghĩa') ?></h4>
        <?php if (!empty($user->likedefinitions)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Định nghĩa') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Islike') ?></th>
                <th scope="col" class="actions"><?= __('Hành động') ?></th>
            </tr>
            <?php foreach ($user->likedefinitions as $likedefinitions): ?>
            <tr>
                <td><?= h($likedefinitions->definition->define) ?></td>
                <td><?= h($likedefinitions->user->namedisplay) ?></td>
                <td><?= h($likedefinitions->islike) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Likedefinitions', 'action' => 'view', $likedefinitions->definition_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Likedefinitions', 'action' => 'edit', $likedefinitions->definition_id]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>',['action'   => 'delete',$likedefinitions->definition_id],['escape'   => false,'title'=>'xóa','confirm' => __('Bạn Có Muốn Xóa Không?', $likedefinitions->definition_id)]);
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Like nghĩa') ?></h4>
        <?php if (!empty($user->likemeans)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Nghĩa') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Islike') ?></th>
                <th scope="col" class="actions"><?= __('Hành động') ?></th>
            </tr>
            <?php foreach ($user->likemeans as $likemeans): ?>
            <tr>
                <td><?= h($likemeans->mean->mean) ?></td>
                <td><?= h($likemeans->user->name) ?></td>
                <td><?= h($likemeans->islike) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>',['action'   => 'delete',$likemeans->mean_id],['escape'   => false,'title'=>'xóa','confirm' => __('Bạn Có Muốn Xóa Không?', $likemeans->mean_id)]);
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Nghĩa Liên quan') ?></h4>
        <?php if (!empty($user->means)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Thuật ngữ') ?></th>
                <th scope="col"><?= __('Nghĩa') ?></th>
                <th scope="col"><?= __('Đóng góp') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Lĩnh vực') ?></th>
                <th scope="col" class="actions"><?= __('Hành động') ?></th>
            </tr>
            <?php foreach ($user->means as $means): ?>
            <tr>
                <td><?= h($means->word->word) ?></td>
                <td><?= h($means->mean->mean) ?></td>
                <td><?= h($means->contribute) ?></td>
                <td><?= h($means->user->namedisplay) ?></td>
                <td><?= h($means->category->name) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Means', 'action' => 'delete', $means->id], ['confirm' => __('Bạn có muốn xóa không?', $means->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
