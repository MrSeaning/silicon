<?php
require_once("core/function.php");
require_once("core/widget.php");
require_once("core/shortcode.php");
require_once("core/theme.php");
require_once("core/backup.php");
//后台配置项
function themeConfig($form)
{

    $logo = new Typecho_Widget_Helper_Form_Element_Text('logo', NULL, "网站Logo", _t('网站Logo'), _t('网站Logo'));
    $form->addInput($logo);

    $tips = new Typecho_Widget_Helper_Form_Element_Text('tips', NULL, "我是一个默认的公告", _t('公告'), _t('公告内容，支持html'));
    $form->addInput($tips);

    $defaultImg = new Typecho_Widget_Helper_Form_Element_Text('defaultImg', NULL, "", _t('默认特色图'), _t('图片'));
    $form->addInput($defaultImg);

    $swiper = new Typecho_Widget_Helper_Form_Element_Text('swiper', NULL, NULL, _t('轮播文章id'), _t('文章ID，以逗号,隔开'));
    $form->addInput($swiper);

    $pin = new Typecho_Widget_Helper_Form_Element_Text('pin', NULL, NULL, _t('置顶文章id'), _t('文章ID，以逗号,隔开,三或者四个最好'));
    $form->addInput($pin);

    $cidId = new Typecho_Widget_Helper_Form_Element_Text('cidId', NULL, NULL, _t('首页列表不显示的分类ID'), _t('在这里填入欲隐藏的分类ID，使用半角逗号“,”填入多个，如：1,2，留空不显示'));
    $form->addInput($cidId);

    $postType = new Typecho_Widget_Helper_Form_Element_Select("postType", array('grid' => '卡片模式', 'list' => '列表模式'), 1, _t('首页文章模式'), _t('首页文章模式:卡片，网格'));
    $form->addInput($postType);

    $icp = new Typecho_Widget_Helper_Form_Element_Text("icp", NULL, NULL, "ICP备案号", '');
    $form->addInput($icp);

    $gongan = new Typecho_Widget_Helper_Form_Element_Text("gongan", NULL, NULL, "公安网备案号", '');
    $form->addInput($gongan);

    backThemeOption();
}

//特色图设置
if ($_SERVER['SCRIPT_NAME'] == "/admin/write-post.php") {
    function themeFields($layout)
    {
        $img = new Typecho_Widget_Helper_Form_Element_Text('img', NULL, NULL, _t('文章特色图'), _t('在这里填入一个图片URL地址'));
        $layout->addItem($img);
    }
}
