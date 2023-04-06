<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<main class="page-wrapper mb-5">
    <?php if ($this->have()) : ?>
        <section class="container mt-2 mb-lg-5 pt-lg-2 pb-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="/"><i class="bx bx-home-alt fs-lg me-1"></i>首页</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page"><?php $this->category(); ?></li>
                </ol>
            </nav>
            <!-- Page title -->
            <div class="row align-items-end gy-3 mb-4 pb-lg-3 pb-1">
                <div class="col-lg-12 col-md-12">
                    <h2 class="title my-2 mb-md-0"><?php $this->category(); ?> <small class="text-muted fs-6"><?php echo $this->getDescription(); ?></small></h2>

                </div>
            </div>
            <?php while ($this->next()) : ?>
                <!-- Item -->
                <article class="card border-0 shadow-sm card-hover mb-4">
                    <div class="row g-0">
                        <div class="col-sm-4 rounded-start position-relative bg-position-center bg-repeat-0 bg-size-cover" style="background-image: url(<?php echo thumbside($this); ?>); min-height: 15rem;">
                            <a href="<?php $this->permalink() ?>" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
                            <?php
                            $commentNum = $this->commentsNum;
                            if ($commentNum > 10) :
                            ?>
                                <a href="<?php $this->permalink() ?>" class="btn btn-icon btn-secondary btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="热评文章">
                                    <i class="bx bx-star"></i>
                                </a>
                            <?php endif ?>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <?php $categories = $this->categories; ?>
                                    <?php foreach ($categories as $cate) { ?>
                                        <?php echo '<a class="badge fs-sm bg-primary text-decoration-none" href="' . $cate['permalink'] . '">' . $cate['name'] . '</a>'; ?>
                                    <?php } ?>
                                    <span class="fs-sm text-muted border-start ps-3 ms-3"><?php $this->dateWord(); ?></span>
                                </div>
                                <h3 class="h4">
                                    <a href="<?php $this->permalink() ?>"> <?php $this->title() ?></a>
                                </h3>
                                <p><?php $this->excerpt(60, '...'); ?></p>
                                <hr class="my-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">
                                        <img src="<?php $this->options->themeUrl('assets/img/tx.jpg')  ?>" class="rounded-circle border me-3" width="24" alt="Avatar">
                                        Mr.Seaning
                                    </a>
                                    <div class="d-flex align-items-center text-muted">
                                        <div class="d-flex align-items-center me-3">
                                            <i class="bx bx-like fs-lg me-1"></i>
                                            <span class="fs-sm">0</span>
                                        </div>
                                        <div class="d-flex align-items-center me-3">
                                            <i class="bx bx-comment fs-lg me-1"></i>
                                            <span class="fs-sm"><?php $this->commentsNum(); ?></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile ?>
        </section>
        <!--分页-->
        <section class="container my-5">
            <nav>
                <?php $this->pageNav('<i class="bx bx-chevron-left mx-n1"></i>', '<i class="bx bx-chevron-right mx-n1"></i>', 5, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination pagination-lg justify-content-center', 'itemTag' => 'li', 'itemClass' => 'page-item', 'textTag' => 'a', 'currentClass' => 'active', 'prevClass' => '', 'nextClass' => '')); ?>
            </nav>
        </section>
    <? else : ?>
        <section class="d-flex justify-content-center mt-5 pt-5">
            <div class="container text-center py-1 py-md-4 py-lg-5">
                <div><svg t="1647089152703" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="11910" width="256" height="256">
                        <path d="M973.745733 456.314701c0 245.360739-206.428874 443.641312-461.743627 443.641312s-461.743627-198.280573-461.743628-443.641312S256.687353 12.673389 512.002106 12.673389s461.743627 199.186376 461.743627 443.641312" fill="#FFE04A" p-id="11911"></path>
                        <path d="M511.996211 913.531276c-261.657342 0-475.330679-204.619232-475.330679-457.224434S249.433066 0 511.996211 0s475.330679 204.619232 475.330679 457.224434-213.671372 456.306842-475.330679 456.306842z m0-887.282624c-248.076185 0.007859-449.072203 192.855577-449.072203 430.05819s201.005843 430.965958 449.074168 430.965958 449.074168-192.847717 449.074168-430.060155S759.168557 26.256511 511.996211 26.256511z" fill="#545971" p-id="11912"></path>
                        <path d="M511.998176 760.529086c-188.320665 0-350.386783-60.661323-428.250513-190.132271 53.418825 185.605219 224.537084 321.412862 427.344709 321.412862s374.831687-135.807643 427.34471-321.412862c-76.052123 129.470948-239.024045 190.132272-426.438906 190.132271" fill="#FFD05A" p-id="11913"></path>
                        <path d="M350.837861 267.999931a5.44268 5.44268 0 0 1-3.621249-0.905804l-134.003895-39.837668c-7.242498-1.811607-10.863747-9.054105-9.054105-16.296603s9.054105-10.863747 16.296603-9.054104l134.003895 39.837668c7.242498 1.811607 10.863747 9.054105 9.054105 16.296603a13.325725 13.325725 0 0 1-12.675354 9.959908z m315.981971 0a13.325725 13.325725 0 0 1-12.675354-9.959908c-1.811607-7.242498 1.811607-14.486961 9.054105-16.296603l134.003895-39.837668c7.242498-1.811607 14.486961 1.811607 16.296603 9.054104s-1.811607 14.486961-9.054105 16.296603l-134.003895 39.837668a5.444645 5.444645 0 0 1-3.621249 0.905804z" fill="#545971" p-id="11914"></path>
                        <path d="M374.373032 331.37277c0-13.581157-11.76955-24.444904-25.346778-24.444904H218.649502c-14.486961 0-25.346778 10.863747-25.346778 24.444904V917.160384c0 13.581157-6.338659 33.499009-14.48696 45.268559L150.747646 1003.172415c-8.148301 10.863747-2.715446 20.827585 10.863747 20.827585h243.549132c14.486961 0 19.014013-9.054105 10.863747-20.827585l-28.066153-40.743472c-8.148301-10.863747-14.486961-31.689367-14.486961-45.268559V331.37277z m481.667373 691.719462c14.486961 0 19.014013-9.054105 10.863747-20.827585l-28.062223-40.735612c-8.148301-10.863747-14.486961-31.689367-14.486961-45.270525V331.37277c0-13.581157-11.76955-24.444904-25.346778-24.444904h-129.474878c-14.486961 0-25.346778 10.863747-25.346778 24.444904V917.160384c0 13.581157-6.338659 33.499009-14.48696 45.268559l-28.070083 40.743472c-8.148301 10.863747-2.715446 20.827585 10.863747 20.827585h243.551097z" fill="#88C8FC" p-id="11915"></path>
                        <path d="M865.09844 306.925901c0 9.054105-9.959908 15.390799-21.729459 15.390799h-217.294586c-11.76955 0-21.729459-7.242498-21.729459-15.390799s9.959908-15.390799 21.729459-15.390799h217.294586c11.76955 0 21.729459 6.338659 21.729459 15.390799m-450.88381 0c0 9.054105-9.959908 15.390799-21.729459 15.390799H174.284782c-11.76955 0-21.729459-7.242498-21.729459-15.390799s9.959908-15.390799 21.729459-15.390799h217.290656c12.675354 0 22.635262 6.338659 22.635262 15.390799" fill="#545971" p-id="11916"></path>
                        <path d="M508.374962 451.789613c-24.444904-0.905803-47.080166 19.014013-49.795612 44.364721L431.417036 767.771584c-2.715446 24.444904 15.390799 44.364721 40.743472 44.364721l79.673371-1.811607c24.444904-0.905803 43.458917-20.827585 40.743472-46.174363l-27.162315-266.186359c-2.715446-24.444904-24.444904-45.268559-49.795611-46.174363z" fill="#DD6B73" p-id="11917"></path>
                        <path d="M471.254704 824.811659a53.145709 53.145709 0 0 1-53.418825-59.75552l27.162314-271.609391c2.715446-31.689367 30.783563-56.134271 62.47293-56.134271h8.156161c31.689367 0.905803 59.75552 27.162314 62.470966 57.945878l26.256511 266.184394a56.318968 56.318968 0 0 1-13.581157 42.553114 52.196679 52.196679 0 0 1-40.743472 18.10821l-79.675337 1.811607c1.805712 0.895979 0.899909 0.895979 0.899909 0.895979z m36.216419-360.346692c-17.202406 0-33.499009 14.486961-35.310615 31.689367L444.998193 767.771584a27.468834 27.468834 0 0 0 6.338659 20.827585 28.097591 28.097591 0 0 0 19.917852 8.148302l79.673372-1.811607a29.472997 29.472997 0 0 0 20.827585-9.054105c5.432856-5.432856 7.242498-13.581157 7.242498-21.729459L552.739683 497.965941c-1.811607-18.10821-18.10821-33.499009-36.21642-33.499009z" fill="#545971" p-id="11918"></path>
                        <path d="M849.70764 907.200476a29.87776 29.87776 0 1 0 29.87776-29.87776 29.87776 29.87776 0 0 0-29.87776 29.87776z" fill="#88C8FC" p-id="11919"></path>
                        <path d="M587.144495 957.903856a26.256511 26.256511 0 1 0 26.256511-26.256511 26.256511 26.256511 0 0 0-26.256511 26.256511z" fill="#88C8FC" p-id="11920"></path>
                        <path d="M104.571318 907.200476A24.444904 24.444904 0 1 0 129.016222 882.755572a24.444904 24.444904 0 0 0-24.444904 24.444904z" fill="#88C8FC" p-id="11921"></path>
                    </svg></div>
                <h2 class="h1 my-4">当前分类暂无文章</h2>
                <p class="lead pb-3 mb-3">换个分类试试吧</p>
                <a href="/" class="btn btn-lg btn-primary shadow-primary w-sm-auto w-100">
                    <i class="bx bx-home-alt me-2 ms-n1 lead"></i>
                    首页
                </a>
            </div>
        </section>
    <? endif ?>
</main>

<?php $this->need('footer.php'); ?>