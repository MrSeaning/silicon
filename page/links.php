<?php

/**
 * 友链
 * 还未完成
 * @package custom
 */
?>
<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>
<main class="container my-5 post">
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="/"><i class="icon icon-zhuye fs-lg"></i>首页</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <?php $this->title() ?>
            </li>
        </ol>
    </nav>
    <section class="container pb-3 d-flex flex-column align-items-center">
        <h1 class="pb-3"><?php $this->title() ?></h1>
    </section>
    <section class="container pb-2 py-mg-4">
        <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-4">
            <!-- Content -->
            <div>
                <?php $this->content(); ?>
            </div>
            <div class="col">
                <a href="#" target="_blank" class="text-decoration-none">
                    <div class="card card-hover text-white bg-gradient-primary border-primary d-sm-flex flex-sm-row align-items-sm-center justify-content-between border-0 p-2 p-md-2 mb-4">
                        <div class="d-flex align-items-center pe-sm-3">
                            <img src="<?php $this->options->themeUrl('assets/img/tx.jpg')  ?>" width="60" class="img-thumbnail rounded-circle" alt="Mr.Seaning">
                            <div class="ps-3 ps-sm-4">
                                <h6 class="mb-2 text-white">Mr.Seaning</h6>
                                <div class="fs-sm text-white opacity-50">网站描述</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end pt-3 pt-sm-0">
                            <i class='bx bx-link-external'></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        </div>
    </section>
</main>

<?php $this->need('footer.php'); ?>