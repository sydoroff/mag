<?php
/**
 * Created by PhpStorm.
 * User: юзер
 * Date: 09.11.2018
 * Time: 20:42
 */
function TitleToLink($str)
{
    $str=trim("$str");
    if(count_chars($str)>0) return " title=\"$str\"";
    else return NULL;
}

function PostDefaultVal($name,$def,$int = TRUE)
{
    if ($int)
    {
        if (isset($_POST[$name]))
            $res = intval($_POST[$name]);
        else
            $res = $def;
    }
    else
    {
        if (isset($_POST[$name])&&count_chars(trim($_POST[$name]))>0)
            $res = $_POST[$name];
        else
            $res = $def;
    }
    return $res;
}