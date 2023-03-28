<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>

<main class="container my-5 post">
    <nav>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="/"><i class="bx bx-home-alt fs-lg"></i>首页</a>
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
        <div class="row gy-4">
            <!-- Content -->
            <div class="col-lg-12">
                <div class="card border-0 post-content">
                    <div class="card-body">
                        <?php _parseContent($this); //$this->content(); 
                        ?>
                    </div>
                </div>

                <?php $this->need('comments.php'); ?>

            </div>
        </div>
    </section>

</main>

<?php $this->need('footer.php'); ?>