<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<main class="page-wrapper mb-5">
    <?php if ($this->have()) : ?>
        <section class="container mt-4 mb-lg-5 pt-lg-2 pb-5">
            <!-- Page title -->
            <div class="row align-items-end gy-3 mb-4 pb-lg-3 pb-1">
                <div class="col-lg-12 col-md-12">
                    <h2 class="mb-2 mb-md-0 title"><?php $this->category(",", false, "无") ?></h2>
                </div>
            </div>
            <div class="row row-cols-1">
                <?php while ($this->next()) : ?>
                    <!-- Item -->
                    <div class="d-flex flex-column h-100 px-2 px-sm-0 my-4 mx-2">
                        <div class="card h-100 position-relative border-0 shadow-sm pt-4">
                            <span class="btn btn-icon btn-primary shadow-primary pe-none position-absolute top-0 start-0 translate-middle-y ms-4">
                                <i class="bx bxs-quote-left"></i>
                            </span>
                            <div class="card-body pb-3 mb-0">
                                <?php $this->content(); ?>
                            </div>
                            <div class="card-footer border-0 fw-lighter fs-6 text-muted pt-0">
                                <small><?php $this->dateWord(); ?></small>
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
        </section>
        <!--分页-->
        <section class="container my-5">
            <nav>
                <?php $this->pageNav('<i class="bx bx-chevron-left mx-n1"></i>', '<i class="bx bx-chevron-right mx-n1"></i>', 5, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination justify-content-center', 'itemTag' => 'li', 'itemClass' => 'page-item', 'textTag' => 'a', 'currentClass' => 'active', 'prevClass' => '', 'nextClass' => '')); ?>
            </nav>
        </section>
    <? else : ?>
        <section class="d-flex justify-content-center mt-5 pt-5">
            <div class="container text-center">
                <!-- Text -->
                <h1 class="display-1 text-primary">(●'◡'●)</h1>
                <p class="lead">当前分类暂无文章，换个分类看看吧</p>
                <a href="/" class="btn btn-lg btn-primary shadow-primary w-sm-auto w-100">
                    <i class="bx bx-home-alt me-2 ms-n1 lead"></i>
                    首页
                </a>
            </div>
        </section>
    <? endif ?>
</main>

<?php $this->need('footer.php'); ?>