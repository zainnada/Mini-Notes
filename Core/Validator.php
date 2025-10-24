<?php

namespace Core;

class Validator {
    public static function string($value,$min=1,$max=INF): bool {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value)<=$max;
    }
    
    public static function email($value):bool{
        return filter_var($value,FILTER_VALIDATE_EMAIL);
    }

    public static function greaterThan(int $n1,int $n2):bool{
        return $n1 > $n2;
    }

}
