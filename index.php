<?php

/**
 * 第二款主题，样式来源于https://silicon.createx.studio/
 *
 * @package Silicon 
 * @author Mr.Seaning
 * @version 1.0
 * @link http://www.seaning.com/
 * @update 2022-02-22
 */
?>
<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<!--轮播图-->
<?php
if ($this->options->swiper) {
    include('includes/swiper.php');
}
?>
<main class="container mb-5">
    <!--公告-->
    <?php
    if ($this->options->tips) :
        include("includes/tips.php");
    endif;
    ?>
    <!--推荐-->
    <?php
    if ($this->options->pin) {
        include("includes/pin.php");
    }
    ?>
    <!--最新文章-->
    <?php
    if ($this->options->postType == "grid") {
        include("includes/post-grid.php");
    } else {
        include("includes/post-list.php");
    }
    ?>

    <!--分页-->
    <section class="my-5">
        <nav>
            <?php $this->pageNav('<i class="bx bx-chevron-left mx-n1"></i>', '<i class="bx bx-chevron-right mx-n1"></i>', 5, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination justify-content-center', 'itemTag' => 'li', 'itemClass' => 'page-item', 'textTag' => 'a', 'currentClass' => 'active', 'prevClass' => '', 'nextClass' => '')); ?>
        </nav>
    </section>
</main>

<?php $this->need('footer.php'); ?>