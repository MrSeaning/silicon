<?php
/*
 * 短代码功能
 * @Author: Mr.Seaning 
 * @Date: 2022-03-09 17:10:25 
 * @Last Modified by: Mr.Seaning
 * @Last Modified time: 2022-03-12 13:22:39
 */
function  _parseContent($post, $login = false)
{
    $content = $post->content;
    //下载按钮
    if (strpos($content, '{down') !== false) {
        $content = preg_replace(
            '/{down url="([\s\S]*?)"}/',
            '<a title="点击下载文件" class="btn btn-info btn-icon" target="_blank" href="$1"><i class="bx bx-download" ></i></a>',
            $content
        );
    }
    //手风琴面板
    if (strpos($content, '{accordion') !== false) {
        $content = preg_replace('/{accordion}([\s\S]*?){\/accordion}/', '<section><sean-accordion>$1</sean-accordion></section>', $content);
    }
    //本地音乐
    if (strpos($content, '{music') !== false) {
        $content = preg_replace('/{music url="([\s\S]*?)"}/', '<section><sean-music url="$1"></sean-music></section>', $content);
    }
    echo $content;
}
