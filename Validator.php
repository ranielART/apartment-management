<?php

class Validator
{

    public static function string($value, $max = INF)
    {
        $value = trim($value);

        return empty($value) && strlen($value) <= $max;
    }

}