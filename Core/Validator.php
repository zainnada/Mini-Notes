<?php

namespace Core;

use DateTime;

class Validator
{
    public static function string($value, $min = 1, $max = INF): bool
    {
        $value = trim($value);
        $value = preg_replace('/\s+/', ' ', $value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function name($name): bool
    {
        return preg_match("/^[\p{L}\s'-]+$/u", $name);
    }

    public static function email($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function date($birthdate): bool
    {

        // Strict format and validity check (YYYY-MM-DD)
        $d = DateTime::createFromFormat('Y-m-d', $birthdate);

        // I have already validated this section using js in the view.
        if ($d > new DateTime("2015-12-31") || $d < new DateTime("1950-01-01")) {
            return false;
        }
        return true;
    }

    public static function greaterThan(int $n1, int $n2): bool
    {
        return $n1 > $n2;
    }

}
