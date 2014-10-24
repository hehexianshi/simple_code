<?php
function ip2l($str)
{
    $arr = explode('.', $str);

    $s = array(); 
    foreach ($arr as $v) {
        $s[] = dechex($v);
    }
    return hexdec(implode('', $s));

}
function l2ip($int) 
{
    $hex = dechex($int);
    $arr = str_split($hex, 2);
    foreach ($arr as $k => $v) {
        $arr[$k] = hexdec($v);
    }
    return implode('.', $arr);

}
