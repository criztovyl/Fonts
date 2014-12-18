<?php
//From http://php.net/manual/en/function.sprintf.php#81706

function sprintf2($str='', $vars=array(), $char='%')
{
    if (!$str) return '';
    if (count($vars) > 0)
    {
        foreach ($vars as $k => $v)
        {
            $str = str_replace($char . $k, $v, $str);
        }
    }

    return $str;
}
?>
