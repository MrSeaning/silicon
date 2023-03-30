<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>
<?php
$this->content = createCatalog($this->content);
?>
<main class="container my-5 post">
    <nav>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="/"><i class="bx bx-home-alt fs-lg"></i>首页</a>
            </li>
            <li class="breadcrumb-item">
                <?php $categories = $this->categories; ?>
                <?php foreach ($categories as $cate) { ?>
                    <?php echo '<a href="' . $cate['permalink'] . '">' . $cate['name'] . '</a>'; ?>
                <?php } ?>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <?php $this->title() ?>
            </li>
        </ol>
    </nav>

    <section class="container pb-3 d-flex flex-column align-items-center">
        <h1 class="pb-3"><?php $this->title() ?></h1>
        <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-3">
            <div class="d-flex align-items-center flex-wrap text-muted mb-md-0 mb-4">
                <div class="fs-xs border-end pe-3 me-3 mb-2">
                    <span class="badge bg-faded-primary text-primary fs-base">
                        <?php $categories = $this->categories; ?>
                        <?php foreach ($categories as $cate) { ?>
                            <?php echo $cate['name']; ?>
                        <?php } ?>
                    </span>
                </div>
                <div class="fs-sm border-end pe-3 me-3 mb-2"><?php $this->date(); ?></div>
                <!-- <div class="d-flex mb-2 border-end pe-3 me-3">
                    <div class="d-flex align-items-center me-3">
                        <i class="bx bx-like fs-base me-1"></i>
                        <span class="fs-sm">0</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bx bx-comment fs-base me-1"></i>
                        <span class="fs-sm">0</span>
                    </div>
                </div> -->
                <div class="fs-sm pe-3 me-3 mb-2 text-muted"><span>本文约<?php echo art_count($this->cid); ?> 字
                        阅读大约需要 <?php echo art_time($this->cid) ?> 分钟</span></div>

            </div>
        </div>
    </section>

    <section class="container pb-2 py-mg-4">
        <div class="row gy-4">
            <!-- Content -->
            <div class="col-lg-9">
                <?php if (timeZoneold($this->date->timeStamp)) : ?>
                    <div class="alert alert-warning mb-3" role="alert">
                        <h4 class="pt-2 alert-heading"><i class='bx bxs-bell-ring bx-tada me-2'></i>友情提示</h4>
                        <hr class="opacity-25 my-0" style="color: currentColor;">
                        <p class="pt-3 mb-2">本文最后更新于 <span id="article-expire-day">一年</span>前</p>
                        <p>文中所描述的信息可能已发生改变,请酌情参考阅读</p>
                    </div>
                <?php endif ?>
                <div class="card border-0 shadow-sm post-content">
                    <div class="card-body">
                        <?php _parseContent($this); //$this->content(); 
                        ?>
                    </div>
                    <div class="card-footer  fs-sm text-muted">
                        <div class="rounded postcopyright">
                            <ul class="list-group list-group-flush mx-0">
                                <li class="list-group-item d-flex align-items-center border-0">
                                    <i class="bx bx-user fs-lg opacity-70 me-2"></i>
                                    <?php $this->author() ?>
                                </li>
                                <li class="list-group-item d-flex align-items-center border-0">
                                    <i class="bx bx-link fs-lg opacity-70 me-2"></i>
                                    <a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a>
                                </li>
                                <li class="list-group-item d-flex align-items-center border-0">
                                    <i class="bx bx-share-alt fs-lg opacity-70 mt-n1 me-2"></i>
                                    作品采用： <a href="//creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" target="_blank" rel="noopener noreferrer nofollow">署名-非商业性使用-相同方式共享 4.0 国际 (CC BY-NC-SA 4.0)</a>许可协议授权
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <?php $tags = $this->tags;
                if ($tags) {
                ?>
                    <div class="card border-0 my-4">
                        <div class="card-body">
                            <div class="d-flex flex-sm-row flex-column pt-2">
                                <?php foreach ($tags as $tag) : ?>
                                    <?php echo '<a class="btn btn-secondary btn-sm shadow-secondary  me-2 mb-2" href="' . $tag['permalink'] . '">' . '<i class="bx bxs-tag-alt"></i>' . $tag['name'] . '</a>'; ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php $this->need('comments.php'); ?>

            </div>

            <!-- sidebar -->

            <?php $this->need('sidebar.php');
            ?>
        </div>
    </section>

</main>

<?php $this->need('footer.php'); ?>