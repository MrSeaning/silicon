<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<main class="page-wrapper">
    <section class="container d-flex flex-column  h-100 align-items-center position-relative zindex-5 pt-5">
        <div class="text-center pt-5 pb-3 mt-auto">

            <!-- Parallax gfx (Light version) -->
            <div class="parallax mx-auto d-dark-mode-none" style="max-width: 574px; transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                <div class="parallax-layer" data-depth="-0.15" style="transform: translate3d(-5px, 3.8px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                    <img src="<?php $this->options->themeUrl('assets/img/404/light/layer01.png'); ?>" alt="Layer">
                </div>
                <div class="parallax-layer" data-depth="0.12" style="transform: translate3d(4px, -3px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                    <img src="<?php $this->options->themeUrl('assets/img/404/light/layer02.png'); ?>" alt="Layer">
                </div>
                <div class="parallax-layer zindex-5" data-depth="-0.12" style="transform: translate3d(-4px, 3px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                    <img src="<?php $this->options->themeUrl('assets/img/404/light/layer03.png'); ?>" alt="Layer">
                </div>
            </div>

            <!-- Parallax gfx (Dark version) -->
            <div class="parallax mx-auto d-none d-dark-mode-block" style="max-width: 574px; transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                <div class="parallax-layer" data-depth="-0.15" style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                    <img src="<?php $this->options->themeUrl('assets/img/404/dark/layer01.png'); ?>" alt="Layer">
                </div>
                <div class="parallax-layer" data-depth="0.12" style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                    <img src="<?php $this->options->themeUrl('assets/img/404/dark/layer02.png'); ?>" alt="Layer">
                </div>
                <div class="parallax-layer zindex-5" data-depth="-0.12" style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                    <img src="<?php $this->options->themeUrl('assets/img/404/dark/layer03.png'); ?>" alt="Layer">
                </div>
            </div>

            <h1 class="visually-hidden">404</h1>
            <h2 class="display-5">Ooops!</h2>
            <p class="fs-xl pb-3 pb-md-0 mb-md-5">那个有没有可能是你输错地址了🍒</p>
            <a href="/" class="btn btn-lg btn-primary shadow-primary w-sm-auto w-100">
                <i class="bx bx-home-alt me-2 ms-n1 lead"></i>
                回首页
            </a>
        </div>


    </section>
</main>
<script src="<?php $this->options->themeUrl('assets/js/parallax.min.js') ?>"></script>
<?php $this->need('footer.php'); ?>