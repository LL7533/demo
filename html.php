<?php
$str =  strip_tags(htmlspecialchars_decode("啊 html  <html> asdasd</html>;  123  a a"));
var_dump(filter_emoji($str)) ;
//过滤EMOJI表情
function filter_emoji($str)
{
    $str = preg_replace_callback(
        '/./u',
        function (array $match) {
            return strlen($match[0]) >= 4 ? '' : $match[0];
        },
        $str);
    return $str;
}
?>
