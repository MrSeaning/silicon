<?php

/**
 * 友链
 * @package custom
 * 
 * 
 *使用友链插件 https://gitee.com/Mejituu/Links
 */
?>
<!--模板-->
<!-- <div class="col">
    <a href="{url}" target="_blank" class="text-decoration-none">
        <div class="card card-hover text-white {user} d-sm-flex flex-sm-row align-items-sm-center justify-content-between border-0 p-2 p-md-2 mb-4">
            <div class="d-flex align-items-center pe-sm-3">
                <img src="{image}" width="{size}" class="img-thumbnail rounded-circle" alt="{name}">
                <div class="ps-2 ps-sm-3">
                    <h6 class="mb-2 text-white">{name}</h6>
                    <div class="fs-xs text-white opacity-90">{description}</div>
                </div>
            </div>
            <div class="d-flex justify-content-end pt-3 pt-sm-0">
                <i class='bx bx-link-external'></i>
            </div>
        </div>
    </a> -->
</div>
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
        <!-- Content -->
        <div class="card border-0 shadow-sm post-content">
            <div class="card-body">
                <?php _parseContent($this); //$this->content(); 
                ?>
                <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-4">
                    <?php $this->links('SHOW_MIX'); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php $this->need('footer.php'); ?>