<?php
namespace App\Services;

class GlobalServices
{

    public static function generateUniqueString(){
        $string = substr(md5(uniqid(rand(), true)), 0, 8);
        return $string;
    }
    
}