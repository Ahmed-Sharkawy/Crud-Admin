<?php
$ERROR = "";
$success = "";

    // function trimImput($value){
    //     $str = trim($value);
    // }


    function requireInput($value){
        $str = trim($value);
        if(strlen($str) > 0){
            return true;
        }
        return false;
    }

    // sanitize Input STRING
    function santInputSTRING($value){
        $str = trim($value);
        $str = filter_var($str, FILTER_SANITIZE_STRING);
        return $str;
    }

    // sanitize Input EMAIL
    function santInputEMAIL($value){
        $str = trim($value);
        $str = filter_var($str, FILTER_SANITIZE_EMAIL);
        return $str;
    }

    
    function minInput($value, $min)
    {
        if (strlen($value) > $min) {
            return true;
        }
        return false;
    }


    function maxInput($value, $max)
    {

        if (strlen($value) < $max) {
            return true;
        }
        return false;
    }


    function valInput($email)
    {
        if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
?>
