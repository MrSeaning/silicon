<h2 class="title my-4">推荐</h2>
<div class="row">
    <?php
    $pin = [];
    $pin_text = $this->options->pin;
    $pin_arr = explode(",", $pin_text);
    if (count($pin_arr) === 3 || count($pin_arr) === 4) $pin = $pin_arr;
    foreach ($pin as $cid) :
    ?>
        <?php $this->widget('Widget_Contents_Post@' . $cid, 'cid=' . $cid)->to($item); ?>
        <div class="col">
            <a href="<?php $item->permalink(); ?>" class="card card-portfolio card-hover bg-transparent border-0">
                <div class="card-img-overlay opacity-70 d-flex flex-column align-items-center justify-content-center rounded-3">
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark  rounded-3"></span>
                    <div class="position-relative zindex-4">
                        <h3 class="h5 text-light mb-2 opacity-70"><?php $item->title();
                                                                    ?></h3>
                    </div>
                </div>
                <div class="card-img">
                    <img src="<?php echo thumbside($item);
                                ?>" style="<?php
                                            if ($pin_arr == 3) {
                                                echo "height: 167px;";
                                            } else {
                                                echo "height: 227px;";
                                            }
                                            ?>" class="rounded-3" alt="Image">
                </div>
            </a>
            <!-- Color background on hover -->
            <!-- <article class="card shadow-sm card-hover-primary">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <?php //$categories = $item->categories; 
                        ?>
                        <?php //foreach ($categories as $cate) { 
                        ?>
                            <?php //echo '<a class="badge fs-sm text-nav bg-secondary text-decoration-none position-relative zindex-2" href="' . $cate['permalink'] . '">' . $cate['name'] . '</a>'; 
                            ?>
                        <?php //} 
                        ?>
                        <span class="fs-sm text-muted"><?php //$item->dateWord(); 
                                                        ?></span>
                    </div>
                    <h3 class="h4">
                        <a href="<?php //$item->permalink(); 
                                    ?>" class="stretched-link"><?php //$item->title() 
                                                                ?></a>
                    </h3>
                    <p class="mb-0"> <?php //$item->excerpt(20, '...'); 
                                        ?></p>
                </div>
                <div class="card-footer d-flex align-items-center py-4 text-muted border-top-0">
                    <div class="fs-sm pe-3 me-3"><?php //$this->dateWord(); 
                                                    ?></div>
                    <div class="d-flex align-items-center me-3">border-end
                        <i class="bx bx-like fs-lg me-1"></i>
                        <span class="fs-sm">4</span>
                    </div>
                    <div class="d-flex align-items-center me-3">
                        <i class="bx bx-comment fs-lg me-1"></i>
                        <span class="fs-sm">6</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bx bx-share-alt fs-lg me-1"></i>
                        <span class="fs-sm">0</span>
                    </div> 
        </div>
        </article> -->
        </div>
    <?php
    endforeach;
    ?>
</div>