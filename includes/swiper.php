<div class="position-relative py-lg-4 py-xl-5">
    <?php
    $swiper = [];
    $swiper_text = $this->options->swiper;
    $swiper_arr = explode(",", $swiper_text);
    $swiper = $swiper_arr;
    $x = $y = 0;
    $active = "";
    ?>

    <!-- Swiper tabs -->
    <div class="swiper-tabs position-absolute top-0 start-0 w-100 h-100">
        <?php foreach ($swiper as $cid) : ?>
            <?php $this->widget('Widget_Contents_Post@' . $cid, 'cid=' . $cid)->to($item); ?>
            <?php $x == 0 ? $active = "active" : $active = "";
            ?>
            <div id="image-<?php echo $x ?>" class="position-absolute top-0 start-0 w-100 h-100 bg-position-center bg-repeat-0 bg-size-cover swiper-tab <?php echo $active ?>" style="background-image: url(<?php echo thumbside($item); ?>);">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-35"></span>
            </div>
        <?php $x++;
        endforeach ?>
    </div>

    <!-- Swiper slider -->
    <div class="container position-relative zindex-5 py-5">
        <div class="row py-2 py-md-3">
            <div class="col-xl-5 col-lg-7 col-md-9">

                <!-- Slider controls (Prev / next) -->
                <div class="d-flex justify-content-center justify-content-md-start pb-3 mb-3">
                    <button type="button" id="case-study-prev" class="btn btn-prev btn-icon btn-sm bg-white me-2">
                        <i class="bx bx-chevron-left"></i>
                    </button>
                    <button type="button" id="case-study-next" class="btn btn-next btn-icon btn-sm bg-white ms-2">
                        <i class="bx bx-chevron-right"></i>
                    </button>
                </div>

                <!-- Card -->
                <div class="card bg-white shadow-sm p-3">
                    <div class="card-body">
                        <div class="swiper" data-swiper-options='{
		              "spaceBetween": 30,
		              "loop": true,
		              "tabs": true,
		              "pagination": {
		                "el": "#case-study-pagination",
		                "clickable": true
		              },
		              "navigation": {
		                "prevEl": "#case-study-prev",
		                "nextEl": "#case-study-next"
		              }
		            }'>
                            <div class="swiper-wrapper">
                                <?php foreach ($swiper as $cid) : ?>
                                    <?php $this->widget('Widget_Contents_Post@' . $cid, 'cid=' . $cid)->to($item); ?>
                                    <!-- Item -->
                                    <div class="swiper-slide" data-swiper-tab="#image-<?php echo $y  ?>">

                                        <h3 class="mb-2"><?php $item->title() ?></h3>
                                        <p class="fs-sm text-muted border-bottom pb-3 mb-3">
                                            <?php $categories = $item->categories; ?>
                                            <?php foreach ($categories as $cate) {
                                                $y++; ?>
                                                <?php echo '<a class="badge fs-sm text-nav bg-secondary text-decoration-none position-relative zindex-2" href="' . $cate['permalink'] . '">' . $cate['name'] . '</a>'; ?>
                                            <?php } ?>
                                        </p>
                                        <p class="pb-2 pb-lg-3 mb-3"> <?php $item->excerpt(80, '...'); ?></p>
                                        <a href="<?php $item->permalink() ?>" class="btn btn-primary">查看详情</a>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination (bullets) -->
                <div class="dark-mode pt-4 mt-3">
                    <div id="case-study-pagination" class="swiper-pagination position-relative bottom-0"></div>
                </div>
            </div>
        </div>
    </div>
</div>