<?php function threadedComments($comments, $options)
{
    $commentClass = '';
    $group = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            //$group = '<svg t="1647069598097" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="11498" width="16" height="16"><path d="M440.96 701.888h161.664a397.184 397.184 0 0 1 389.376 319.04H32a421.568 421.568 0 0 1 408.96-319.04z" fill="#FAB727" p-id="11499"></path><path d="M512 893.312c20.288 0 38.848-11.52 47.872-29.632 32.064-64.576 48.128-129.152 48.128-193.664h-192c0 64.512 16 129.088 48.128 193.664 9.024 18.176 27.52 29.632 47.872 29.632z" fill="#FFFFFF" p-id="11500"></path><path d="M512.448 590.208c141.44 0 256-128.512 256-287.104 0-79.168 13.696-171.392-32.448-223.36C689.664 27.584 589.952 0 512.448 0 435.008 0 318.976 18.752 272 79.744c-38.72 50.304-15.552 151.68-15.552 223.36 0 158.592 114.56 287.104 256 287.104z" fill="#784915" p-id="11501"></path><path d="M415.616 646.08C355.2 614.528 307.776 554.112 285.44 479.36c-34.56-20.096-70.784-64.64-61.888-112.448 8.064-43.648 31.808-59.776 55.936-60.416 18.112-48.576 46.272-83.2 98.624-97.472 52.352-14.336 40.192 2.112 72.192-17.6 32-19.712 29.76-43.84 111.296-57.152 81.536-13.376 175.872 37.44 189.952 152.896 0.256 2.112-0.064 4.224-0.128 6.336l0.128 13.632c21.504 3.456 41.472 20.48 48.768 59.776 8.96 48.192-28.032 93.184-62.848 113.024-22.4 74.432-69.76 134.656-129.92 166.144v55.808c-32 42.56-64 63.808-96 63.808s-64-21.248-96-63.808v-55.808z" fill="#F5D6B2" p-id="11502"></path></svg>';
            //$group = '<svg t="1647069860185" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="24217" width="20" height="20"><path d="M760.6 863.5H304.7c-37.2 0-59.4-20.8-67.4-64.7l-57.8-489.7 186.2 120.2 171.8-231.1 173.4 231.1 175-120.2L828 798.8c-7.2 40.1-30.2 64.7-67.4 64.7z" fill="#FFE4B3" p-id="24218"></path><path d="M726.1 857.8H270.2c-31.9 0-72.5-13.7-84.4-78.9-0.1-0.4-0.1-0.7-0.2-1.1l-57.8-489.7c-0.8-6.6 2.3-13.1 8-16.7 5.7-3.5 12.9-3.5 18.5 0.1L327 382.9l162.1-218.2c3.3-4.4 8.4-7 13.8-7s10.6 2.6 13.8 6.9l163.4 217.9 161.3-110.8c5.6-3.8 12.9-4.1 18.7-0.5 5.8 3.5 9 10.1 8.2 16.8l-57.8 489.7c0 0.3-0.1 0.7-0.2 1-4.3 23.9-13.5 42.9-27.3 56.6-14.6 14.7-34.3 22.5-56.9 22.5z m-506.3-84.6c8.2 44.1 30 50 50.3 50H726c27.3 0 44.2-16.8 50.3-50l53.3-451.4L686 420.4c-7.6 5.2-18 3.5-23.6-3.9L503 204 345 416.5c-5.4 7.3-15.6 9.1-23.2 4.2L166.4 320.4l53.4 452.8z" fill="#EFA716" p-id="24219"></path><path d="M495.8 706h-0.2c-6.4-0.1-12.2-3.7-15.2-9.4l-83.6-162.1c-4.4-8.5-1-18.9 7.4-23.3 8.5-4.4 18.9-1 23.3 7.4l68.7 133.1 72.7-133.5c4.6-8.4 15.1-11.5 23.4-6.9 8.4 4.6 11.5 15.1 6.9 23.4L511 697c-3.1 5.6-8.9 9-15.2 9z" fill="#EFA716" p-id="24220"></path></svg>';
            $group = '<svg t="1647070205555" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="44050" width="16" height="16"><path d="M253.44 367.104l103.936 495.104h373.76l133.12-550.4-145.408 144.896-232.448-189.44-131.584 145.92z" fill="#FFDB62" p-id="44051"></path><path d="M787.456 902.656h-522.24c-11.776 0-22.016-8.192-25.088-19.456L83.456 246.272c-2.56-10.752 2.048-22.016 11.264-27.648 9.216-5.632 21.504-5.12 29.696 2.048l206.336 169.472 178.688-233.472c4.608-6.144 12.288-10.24 20.48-10.24s15.36 4.096 20.48 10.24L725.504 394.24l197.632-165.376c8.704-7.168 20.48-7.68 29.696-2.048 9.216 5.632 13.824 16.896 11.264 27.648l-152.064 628.224c-2.048 11.776-12.8 19.968-24.576 19.968z m-501.76-51.2h481.792l129.024-532.992-158.72 132.608c-5.632 4.608-12.288 6.656-19.456 5.632-7.168-1.024-13.312-4.608-17.408-10.24l-171.008-231.936-174.08 227.328c-4.096 5.632-10.24 9.216-17.408 9.728-6.656 1.024-13.824-1.024-18.944-5.632L151.552 308.736l134.144 542.72z" fill="#333333" p-id="44052"></path><path d="M529.92 737.28c-9.216 0-17.408-5.12-22.016-12.8l-101.376-176.128c-7.168-12.288-2.56-28.16 9.216-34.816 12.288-7.168 28.16-2.56 34.816 9.216l79.36 137.728 81.408-138.24c7.168-12.288 23.04-16.384 34.816-9.216 12.288 7.168 16.384 23.04 9.216 34.816l-103.936 176.128c-4.096 8.192-12.288 13.312-21.504 13.312z" fill="#333333" p-id="44053"></path></svg>';
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>
    <li id="li-<?php $comments->theId(); ?>" class="comment-body <?php echo $commentLevelClass;
                                                                    echo $commentClass; ?>">
        <div class="py-4 " id="<?php $comments->theId(); ?>">
            <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
                <div class="d-flex align-items-center me-3">
                    <?php $comments->gravatar('48', ''); ?>
                    <div class="ps-3">
                        <h6 class="fw-semibold mb-0 mt-0"><?php $comments->author(); ?><small data-bs-toggle="tooltip" data-bs-placement="top" title="站长"><?php echo $group; ?></small></h6>
                        <div><?php echo getPermalinkFromCoid($comments->parent); ?></div>
                        <span class="fs-sm text-muted"><?php $comments->date('Y-m-d H:i'); ?></span>
                    </div>
                </div>
                <span class="reply"> <?php $comments->reply(); ?></span>
            </div>

            <?php $comments->content(); ?>
            <?php if ('waiting' == $comments->status) { ?><span class="text-muted fs-xs">您的评论需管理员审核后才能显示！</span><?php } ?>
        </div>
        <!-- Comment reply -->
        <?php if ($comments->children) { ?>
            <div class="position-relative ps-4 mt-4 comment-children">
                <span class="position-absolute top-0 start-0 w-1 h-100 bg-primary"></span>
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } ?>
    </li>
<?php } ?>
<div class="comment" id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($this->allow('comment')) : ?>
        <div class="card border-0 my-4 shadow-sm" id="<?php $this->respondId(); ?>">
            <div class="card-body">
                <div class="card-title">
                    <div class="h5">
                        <i class="text-primary bx bx-message-square-edit"></i>发布评论
                    </div>
                </div>
                <div class="cancel-comment-reply">
                    <?php $comments->cancelReply(); ?>
                </div>
                <!-- Post comments -->
                <form id="comment-form" class="needs-validation" method="post" action="<?php $this->commentUrl() ?>" novalidate>
                    <div class="row">
                        <?php if ($this->user->hasLogin()) : ?>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    登录身份:<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" class="btn btn-danger shadow-danger btn-logout bg-gradient" title="Logout">退出</a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="author" value="<?php $this->remember('author'); ?>" type="text" id="fl-username" required placeholder="昵称" />
                                    <label for="fl-username">昵称</label>
                                    <div class="invalid-tooltip">请输入昵称.</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="mail" type="text" value="<?php $this->remember('mail'); ?>" id="fl-email" required placeholder="邮箱" />
                                    <label for="fl-email">邮箱</label>
                                    <div class="invalid-tooltip">请输入邮箱.</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="url" value="<?php $this->remember('url'); ?>" type="text" id="fl-url" placeholder="网址" />
                                    <label for="fl-url">网址</label>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-12 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="text" id="fl-cont" style="height: 8rem" placeholder="内容" required><?php $this->remember('text'); ?></textarea>
                                <label for="fl-cont">来都来了说点啥吧</label>
                                <div class="invalid-tooltip">别害羞，想说就写下来</div>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button class="btn btn-dark" type="submit">
                                发布评论
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if ($comments->have()) : ?>
            <div class="card border-0 shadow-sm my-4">
                <div class="card-body">
                    <div class="card-title">
                        <div class="h5">
                            <i class="text-primary bx bx-message-square-dots"></i>评论 (<?php $this->commentsNum(); ?>)
                        </div>
                    </div>
                    <hr class="my-2" />
                    <!-- Comment -->

                    <?php $comments->listComments(); ?>

                </div>
                <div class="card-footer">
                    <section class="my-5">
                        <nav>
                            <?php $comments->pageNav('<i class="bx bx-chevron-left mx-n1"></i>', '<i class="bx bx-chevron-right mx-n1"></i>', 5, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination pagination-lg justify-content-center', 'itemTag' => 'li', 'itemClass' => 'page-item', 'textTag' => 'a', 'currentClass' => 'active', 'prevClass' => '', 'nextClass' => '')); ?>
                        </nav>
                    </section>
                </div>
            </div>

        <?php else : ?>
            <div class="card border-0 shadow-sm my-4">
                <div class="card-body">
                    快来抢沙发吧😊😊😊😊
                </div>
            </div>
        <?php endif ?>
    <?php else : ?>

        <div class="card border-0 my-4 shadow-sm">
            <div class="card-body"><i class='bx bx-no-entry text-danger'></i>本篇文章评论功能已关闭</div>
        </div>
    <?php endif ?>
</div>