<?php

//Typecho调用自定义字段值显示特色图，无图显示默认图片
function thumbside($article)
{
    if ($article->fields->img) {
        return $article->fields->img;
    } else if (Helper::options()->defaultImg) {
        return Helper::options()->defaultImg;
    } else {
        return  Helper::options()->themeUrl . "/assets/img/default.png";
    }
}

// 解析头像
function getGravatar($mail)
{
    //$gravatar = Typecho_Widget::widget('Widget_Options')->gravatar;
    $gravatar = "https://gravatar.loli.net/avatar/";
    $mail = strtolower(trim($mail));
    if ($mail == "" || $mail == null) {
        $qq = str_replace('@qq.com', '', $mail);
        if (strstr($mail, "qq.com") && is_numeric($qq) && strlen($qq) < 11 && strlen($qq) > 4) {
            $url = '//thirdqq.qlogo.cn/g?b=qq&nk=' . $qq . '&s=100';
        } else {
            $url = $gravatar . md5($mail) . '?s=40&r=G&d=';
        }
    } else
        $url = Helper::options()->themeUrl . "/assets/img/tx.jpg";

    return $url;
}

// 留言加@
function getPermalinkFromCoid($coid)
{
    $db = Typecho_Db::get();
    $row = $db->fetchRow($db->select('author')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
    if (empty($row)) return '';
    return '<a href="#comment-' . $coid . '">@' . $row['author'] . '</a>';
}
//获取Gravatar头像 QQ邮箱取用qq头像
// function getGravatar($email, $s = 96, $d = 'mp', $r = 'g', $img = false, $atts = array())
// {
//     preg_match_all('/((\d)*)@qq.com/', $email, $vai);
//     if (empty($vai['1']['0'])) {
//         $url = 'https://gravatar.loli.net/avatar/';
//         $url .= md5(strtolower(trim($email)));
//         $url .= "?s=$s&d=$d&r=$r";
//         if ($img) {
//             $url = '<img src="' . $url . '"';
//             foreach ($atts as $key => $val)
//                 $url .= ' ' . $key . '="' . $val . '"';
//             $url .= ' />';
//         }
//     } else {
//         $url = 'https://q2.qlogo.cn/headimg_dl?dst_uin=' . $vai['1']['0'] . '&spec=100';
//     }
//     return  $url;
// }


//页面加载时间
function timer_start()
{
    global $timestart;
    $mtime = explode(' ', microtime());
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
function timer_stop($display = 0, $precision = 3)
{
    global $timestart, $timeend;
    $mtime = explode(' ', microtime());
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = $timeend - $timestart;
    $r = number_format($timetotal, $precision);
    if ($display)
        echo $r;
    return $r;
}

/* 判断文章写完的日期超过180天给出提示 */
function timeZoneold($from)
{
    $now = new Typecho_Date(Typecho_Date::gmtTime());
    return $now->timeStamp - $from > 15552000 ? true : false;
}
//统计文章字数
function art_count($cid)
{
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('table.contents.text')->from('table.contents')->where('table.contents.cid=?', $cid)->order('table.contents.cid', Typecho_Db::SORT_ASC)->limit(1));
    return mb_strlen($rs['text'], 'UTF-8');
}
//文章阅读时间统计
function art_time($cid)
{
    $text_word = art_count($cid);
    return ceil($text_word / 400);
}

/*文章目录 */
//文章内容标题替换
function createCatalog($obj)
{
    global $catalog;
    global $catalog_count;
    $catalog = array();
    $catalog_count = 0;
    $obj = preg_replace_callback('/<h([2])(.*?)>(.*?)<\/h\1>/i', function ($obj) {
        global $catalog;
        global $catalog_count;
        $catalog_count++;
        $catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
        return '<h' . $obj[1] . $obj[2] . '><a id="cl-' . $catalog_count . '"></a>' . $obj[3] . '</h' . $obj[1] . '>';
    }, $obj);
    return $obj;
}

function getCatalog()
{
    global $catalog;
    $index = '';
    if ($catalog) {
        $index = '<ul class="nav">' . "\n";
        $prev_depth = '';
        $to_depth = 0;
        foreach ($catalog as $catalog_item) {
            $catalog_depth = $catalog_item['depth'];
            if ($prev_depth) {
                if ($catalog_depth == $prev_depth) {
                    $index .= '</li>' . "\n";
                } elseif ($catalog_depth > $prev_depth) {
                    $to_depth++;
                    $index .= '<ul class="nav">' . "\n";
                } else {
                    $to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
                    if ($to_depth2) {
                        for ($i = 0; $i < $to_depth2; $i++) {
                            $index .= '</li>' . "\n" . '</ul>' . "\n";
                            $to_depth--;
                        }
                    }
                    $index .= '</li>';
                }
            }
            $index .= '<li class="nav-item"><a class="nav-link" href="#cl-' . $catalog_item['count'] . '" data-scroll="" data-scroll-offset="6">' . $catalog_item['text'] . '</a>';
            $prev_depth = $catalog_item['depth'];
        }
        for ($i = 0; $i <= $to_depth; $i++) {
            $index .= '</li>' . "\n" . '</ul>' . "\n";
        }
    }
    echo $index;
}
