<h2 class="title my-4">最新</h2>
<div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-md-4 gy-2 grid">
    <?php while ($this->next()) : ?>
        <?php if ($this->category != "say") :
        ?>
            <!-- Item -->
            <div class="col pb-3">
                <article class="card card-hover border-0 shadow-sm h-100">
                    <div class="position-relative">
                        <a href="<?php $this->permalink() ?>" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
                        <?php
                        $commentNum = $this->commentsNum;
                        if ($commentNum > 1) :
                        ?>
                            <a href="<?php $this->permalink() ?>" class="btn btn-icon btn-secondary btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="热评文章">
                                <i class="bx bx-star"></i>
                            </a>
                        <?php endif ?>
                        <img src="<?php echo thumbside($this); ?>" class="card-img-top" alt="Image">
                    </div>
                    <div class="card-body pb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <?php $categories = $this->categories; ?>
                            <?php foreach ($categories as $cate) { ?>
                                <?php echo '<a class="badge fs-sm text-nav bg-secondary text-decoration-none" href="' . $cate['permalink'] . '">' . $cate['name'] . '</a>'; ?>
                            <?php } ?>
                            <span datetime="<?php $this->date('c'); ?>" class="fs-sm text-muted"><?php $this->dateWord(); ?></span>
                        </div>
                        <h3 class="h5 mb-0">
                            <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                        </h3>
                    </div>
                    <div class="card-footer py-4">
                        <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none">
                            <img src="<?php $this->options->themeUrl('assets/img/tx.jpg')  ?>" class="rounded-circle me-3" width="24" alt="Avatar">
                            <?php $this->author(); ?>
                        </a>
                    </div>
                </article>
            </div>
        <?php endif
        ?>
    <?php endwhile; ?>
</div>