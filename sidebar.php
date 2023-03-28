<div class="col-lg-3 position-relative widget">
    <div class="card border-0 text-center widget-author shadow">
        <img src="<?php $this->options->themeUrl('assets/img/aside_author.webp')  ?>" class="card-img-top rounded-top" alt="Card image">
        <div class="card-body">
            <img src="<?php $this->options->themeUrl('assets/img/tx.jpg')  ?>" class="widget-author-img img-thumbnail rounded-circle" width="100" alt="">
            <h5 class="fw-medium fs-lg mb-3">Mr.Seaning</h5>
            <p class="fs-sm py-1 mb-3 border border-primary rounded">无实而享大名者必有奇祸</p>

            <!-- <div class="d-flex justify-content-center">
                <a href="https://github.com/mrseaning" class="btn btn-icon btn-outline-secondary btn-github btn-sm me-2">
                    <i class="bx bxl-github"></i>
                </a>
                <a href="#" class="btn btn-icon btn-outline-secondary btn-dribbble btn-sm me-2">
                    <i class="bx bxl-dribbble"></i>
                </a>
                <a href="#" class="btn btn-icon btn-outline-secondary btn-linkedin btn-sm">
                    <i class="bx bxl-linkedin"></i>
                </a>
            </div> -->
        </div>
    </div>
    <div class="card  border-0 shadow  widget-category my-4">
        <div class="card-body">
            <div class="widget-header h6">分类</div>
            <ul class="list-group list-group-flush">
                <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
                <?php while ($categories->next()) : ?>
                    <li class="list-group-item  ">
                        <a class="d-flex text-body align-items-center text-decoration-none" href="<?php $categories->permalink(); ?>">
                            <?php $categories->name(); ?>
                            <span class="badge rounded-pill bg-secondary ms-auto"><?php $categories->count(); ?></span>
                        </a>
                    </li>

                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <?php
    if ($this->is("index")) :
    ?>
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
        <?php if ($tags->have()) : ?>
            <div class="card  border-0 shadow  widget-category my-4">
                <div class="card-body">
                    <div class="widget-header h6">标签</div>
                    <div class="d-flex flex-wrap">

                        <?php while ($tags->next()) : ?>
                            <a href="<?php $tags->permalink(); ?>" rel="tag" class="btn btn-outline-secondary btn-sm px-3 my-1 me-2" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?></a>
                        <?php endwhile; ?>


                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif ?>

    <?php
    if ($this->is("post") && strpos($this->content, "<h2>") > 0) :
    ?>
        <div class="card card-hover border-0 sticky-top shadow widget-toc my-4">
            <div class="card-body">
                <div class="widget-header h6">目录</div>
                <div id="tocList" class="side-nav side-nav-end">
                    <?php getCatalog(); ?>
                </div>
            </div>
        </div>
    <?php endif ?>


</div>