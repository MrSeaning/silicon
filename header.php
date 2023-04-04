<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width,initial-scale=1,viewport-fit=cover" name="viewport">
    <meta content="on" http-equiv="x-dns-prefetch-control">
    <meta name="renderer" content="webkit">
    <meta http-equiv="windows-Target" contect="_top">
    <meta name="robots" content="all">
    <meta name="format-detection" content="telephone=no">
    <link crossorigin="" href="https://cdn.jsdelivr.net" rel="preconnect">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <title>
        <?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/boxicons.min.css') ?>" />
    <?php if ($this->is('index')) : ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/swiper-bundle.min.css') ?>" />
    <?php endif ?>
    <?php if ($this->is('post')) : ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/prism.min.css') ?>" />
    <?php endif ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style.min.css') ?>" />

    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/custom.min.css') ?>" />

    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header('rss1=&rss2=&atom=&generator=&template=&pingback=&xmlrpc=&wlw='); ?>
    <!-- Theme mode -->
    <script>
        let mode = window.localStorage.getItem("mode"),
            root = document.getElementsByTagName("html")[0];
        if (mode !== undefined && mode === "dark") {
            root.classList.add("dark-mode");
        } else {
            root.classList.remove("dark-mode");
        }
    </script>
</head>
<?php if ($this->is("post") && strpos($this->content, "<h2>") > 0) : ?>

    <body data-bs-spy="scroll" data-bs-target="#tocList" data-bs-offset="150" tabindex="0">
    <? else : ?>

        <body>
        <? endif ?>
        <!-- Menu + Theme mode switch + Button -->
        <header class="d-flex flex-column bg-light position-relative navbar-sticky shadow-sm" data-scroll-header>
            <!-- Full screen modal -->
            <div class="modal fade" id="searchCollapse" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">搜索</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="search1" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                                <div class="input-group">

                                    <input class="form-control" type="text" name="s" placeholder="请输入搜索的内容" />
                                    <button class="btn btn-primary" type="submit">
                                        <i class="bx bx-search-alt"></i>
                                    </button>

                                </div>
                            </form>
                            <div class="form-text">输入要搜索的内容</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-expand-lg navbar-light" data-scroll-header>
                <div class="container">
                    <a href="/" class="navbar-brand">
                        <img src="<?php $this->options->themeUrl('assets/img/tx.jpg'); ?>" class="rounded-circle" width="47" alt="<?php $this->options->title() ?>" />
                        <?php $this->options->title() ?>
                    </a>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarCollapse" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="form-check form-switch mode-switch order-lg-2 ms-4 ms-lg-auto me-lg-4" data-bs-toggle="mode">
                        <input type="checkbox" class="form-check-input" id="theme-mode" />
                        <label class="form-check-label d-none d-sm-block d-lg-none d-xl-block" for="theme-mode"></label>
                        <label class="form-check-label d-none d-sm-block d-lg-none d-xl-block" for="theme-mode"></label>
                    </div>
                    <a href="#searchCollapse" data-bs-toggle="modal" class="btn btn-icon btn-outline-primary btn-sm fs-sm rounded order-lg-3 my-3 d-none d-lg-inline-flex">
                        <i class="bx bx-search-alt"></i>
                    </a>
                    <nav id="navbarCollapse" class="offcanvas offcanvas-end">
                        <div class="offcanvas-header shadow-sm">
                            <h6 class="offcanvas-title">导航</h6>
                            <button type="button" class="btn-close" title="导航" data-bs-dismiss="offcanvas"></button>
                        </div>

                        <ul class="navbar-nav offcanvas-body me-auto">
                            <li class="nav-item">
                                <a href="/" class="nav-link">首页</a>
                            </li>
                            <li class="nav-item">
                                <a href="/say" class="nav-link">动态</a>
                            </li>
                            <!--导航-->
                            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                            <?php while ($pages->next()) : ?>
                                <li class="nav-item">
                                    <a href="<?php $pages->permalink(); ?>" class="nav-link"><?php $pages->title(); ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <div class="offcanvas-footer">
                            <form id="search2" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                                <div class="input-group">
                                    <input class="form-control" name="s" type="text" placeholder="请输入搜索的内容" />
                                    <button class="btn btn-primary" type="submit">
                                        <i class="bx bx-search-alt"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </header>