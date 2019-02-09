<?php

function formatDateAndTime($value, $format = 'd/m/Y')
{
    return Carbon\Carbon::parse($value)->format($format);
}

function formatDateMysql($value)
{
    $date = explode("/", $value);
    return $date[2]."-".$date[1]."-".$date[0];
}

?>