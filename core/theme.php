<?php
/*
 * 主题相关
 * @Author: Mr.Seaning 
 * @Date: 2022-03-09 17:10:25 
 * @Last Modified by: Mr.Seaning
 * @Last Modified time: 2023-04-03 17:14:28
 */
// 添加OwO表情
function parsePaopaoBiaoqingCallback($match)
{
    return '<img width="32" class="biaoqing" src="/usr/themes/silicon/assets/owo/img/paopao/' . str_replace('%', '', urlencode($match[1])) . '_2x.png">';
}
function parseAruBiaoqingCallback($match)
{
    return '<img width="32" class="biaoqing" src="/usr/themes/silicon/assets/owo/img/aru/' . str_replace('%', '', urlencode($match[1])) . '_2x.png">';
}
function parseQuyinBiaoqingCallback($match)
{
    return '<img width="32" class="biaoqing" src="/usr/themes/silicon/assets/owo/img/quyin/' . str_replace('%', '', urlencode($match[1])) . '_2x.png">';
}
function parseadaiBiaoqingCallback($match)
{
    return '<img width="32" class="biaoqing" src="/usr/themes/silicon/assets/owo/img/adai/' . str_replace('%', '', urlencode($match[1])) . '.gif">';
}

function parseBiaoQing($content)
{
    $content = preg_replace_callback(
        '/\:\:\(\s*(呵呵|哈哈|吐舌|惊恐|酷|发飙|嗯哼|流汗|大哭|尴尬|黑脸|超赞|金钱|疑问|尬脸|吐|哦豁|委屈|眯眼笑|哟嚯|超开心|滑稽|眨眼|羡慕|入眠|惊哭|气呼呼|震惊|喷水|爱心|心碎|玫瑰|礼物|咖啡|OK|小无奈|偷笑|坏笑|卧槽|要死|亚麻跌|笑哭了|犀利|理一下|坐端正|完美|吃瓜|摊手|困狗|靠墙看|发现|饮酒|忍笑|警告|炸黑|滑稽汗|打脸|胖次|低看)\s*\)/is',
        'parsePaopaoBiaoqingCallback',
        $content
    );

    $content = preg_replace_callback(
        '/\:\*\(\s*(愤怒|装酷|委屈|鄙视|尴尬|魔鬼|惊恐|亲亲|喜欢|猪头|抠鼻|伤心|吃惊|微笑|邪笑|失落|冒汗|闭嘴)\s*\)/is',
        'parseadaiBiaoqingCallback',
        $content
    );

    $content = preg_replace_callback(
        '/\:\@\(\s*(发火|羡慕|吐血倒地|吐血|抱抱|鼓掌|呆滞|流泪|嫌疑|灵魂出窍|囧|惊慌|流口水|送花花|不高兴|阴险|捅死你|暗中观察|哲学思考|无奈|嘟嘴|大佬|闭嘴|害羞|脸红|黑线|举白旗|赞|吐舌头)\s*\)/is',
        'parseAruBiaoqingCallback',
        $content
    );

    $content = preg_replace_callback(
        '/\:\&\(\s*(蛆音滑稽|蛆音震惊|蛆音生气|蛆音吓哭|蛆音血躺|蛆音疑惑|蛆音捡肥皂|蛆音捂脸|蛆音吐血石化|蛆音哼气|蛆音大笑|蛆音偷看|蛆音卖萌|蛆音好的|蛆音惊吓|蛆音摇头|蛆音睡觉|蛆音无语|蛆音吃瓜|蛆音自恋)\s*\)/is',
        'parseQuyinBiaoqingCallback',
        $content
    );
    return $content;
}
