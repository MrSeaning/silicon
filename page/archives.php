<?php

/**
 * 归档
 *
 * @package custom
 */
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
                <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
                $year = 0;
                $mon = 0;
                $i = 0;
                $j = 0;
                $output = '<div id="archives">';
                while ($archives->next()) :
                    $year_tmp = date('Y', $archives->created);
                    $mon_tmp = date('m', $archives->created);
                    $y = $year;
                    $m = $mon;
                    if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
                    if ($year != $year_tmp && $year > 0) $output .= '</ul>';
                    if ($year != $year_tmp) {
                        $year = $year_tmp;
                        $output .= '<h2>' . $year . ' 年</h2><ul>'; //输出年份
                    }
                    if ($mon != $mon_tmp) {
                        $mon = $mon_tmp;
                        $output .= '<li><span>' . $mon . ' 月</span><ul>'; //输出月份
                    }
                    $output .= '<li>' . date('d日: ', $archives->created) . '<a href="' . $archives->permalink . '">' . $archives->title . '</a> <em>(' . $archives->commentsNum . ')</em></li>'; //输出文章日期和标题
                endwhile;
                $output .= '</ul></li></ul></div>';
                echo $output;
                ?>
            </div>
        </div>
    </section>
</main>

<?php $this->need('footer.php'); ?>