<?php
$ERROR = "";
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

    // santInput
    function santInputSTRING($value){
        $str = trim($value);
        $str = filter_var($str, FILTER_SANITIZE_STRING);
        return $str;
    }

    function santInputEMAIL($value){
        $str = trim($value);
        $str = filter_var($str, FILTER_SANITIZE_EMAIL);
        return $str;
    }
?>