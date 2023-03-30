<h2 class="title my-4">最新</h2>
<div class="row list">
    <div class="col-xl-9 col-lg-8">
        <?php while ($this->next()) : ?>
            <?php if ($this->category != "say") :
            ?>
                <?php if ($this->fields->img) : ?>
                    <article class="card border-0 shadow-sm card-hover mb-4">
                        <div class="row g-0">
                            <div class="post-list-img col-sm-4 position-relative bg-position-center bg-repeat-0 bg-size-cover rounded-start" style="background-image: url(<?php echo thumbside($this); ?>); min-height: 15rem;">
                                <a href="<?php $this->permalink() ?>" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
                                <?php
                                $commentNum = $this->commentsNum;
                                if ($commentNum > 1) :
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
                                            <?php echo '<a class="badge fs-sm bg-primary shadow-primary text-decoration-none" href="' . $cate['permalink'] . '">' . $cate['name'] . '</a>'; ?>
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
                                            <img src="<?php $this->options->themeUrl('assets/img/tx.jpg')  ?>" class="rounded-circle me-3" width="24" alt="Avatar">
                                            <?php $this->author(); ?>
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
                <? else : ?>
                    <article class="card shadow mb-4 border-0 card-hover">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <?php $categories = $this->categories; ?>
                                <?php foreach ($categories as $cate) { ?>
                                    <?php echo '<a class="badge fs-sm bg-primary shadow-primary text-decoration-none" href="' . $cate['permalink'] . '">' . $cate['name'] . '</a>'; ?>
                                <?php } ?>
                                <?php
                                $commentNum = $this->commentsNum;
                                if ($commentNum > 10) :
                                ?>
                                    <a href="#" class="btn btn-icon btn-secondary btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="热评文章">
                                        <i class="bx bxs-star"></i>
                                    </a>
                                <?php endif ?>
                            </div>
                            <h3 class="h4">
                                <a href="<?php $this->permalink() ?>"> <?php $this->title() ?></a>
                            </h3>
                            <p class="mb-4">
                                <?php $this->excerpt(60, '...'); ?>
                            </p>
                            <div class="d-flex align-items-center text-muted">
                                <div class="fs-sm border-end pe-3 me-3"><?php $this->dateWord(); ?></div>
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
                    </article>
                <?php endif ?>
            <?php endif
            ?>
        <?php endwhile; ?>
    </div>
    <?php $this->need("sidebar.php"); ?>
</div>