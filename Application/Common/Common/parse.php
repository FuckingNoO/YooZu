<?php
	
   function parse_weibo_content($content)
{
    $content = shorten_white_space($content);
    $content = op_t($content);
    $content = parse_url_link($content);

    $content = parse_expression($content);
    $content = parse_at_users($content);

    $content = parseWeiboContent($content);

    return $content;
}

function shorten_white_space($content)
{
    $content = preg_replace('/\s+/', ' ', $content);
    return $content;
}

function parse_url_link($content)
{
    $content = preg_replace("#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie",
        "'<a href=\"$1\" target=\"_blank\"><i class=\"glyphicon glyphicon-link\" title=\"$1\"></i></a>$4'", $content
    );
    return $content;
}

function parse_expression($content)
{
    return preg_replace_callback("/(\\[.+?\\])/is", 'parse_expression_callback', $content);
}

function get_at_usernames($content)
{
    //正则表达式匹配
    $user_pattern = "/\\@([^\\#|\\s|^\\<]+)/";
    preg_match_all($user_pattern, $content, $users);

    //返回用户名列表
    return array_unique($users[1]);
}

function parse_at_users($content)
{
    $content = $content . ' ';
    //找出被AT的用户
    $at_usernames = get_at_usernames($content);

    //将@用户替换成链接
    foreach ($at_usernames as $e) {
        $user = D('Member')->where(array('nickname' => $e))->find();
        if ($user) {
            $query_user = query_user(array('space_url'), $user['uid']);
            $content = str_replace("@$e", "<a ucard=\"$user[uid]\" href=\"$query_user[space_url]\">@$e </a>", $content);
        }
    }

    //返回替换的文本
    return $content;
}

function parseWeiboContent($content)
{
    hook('parseWeiboContent', array('content' => &$content));
    return $content;

}