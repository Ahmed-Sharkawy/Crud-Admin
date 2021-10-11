<?php

    $my_sqli = mysqli_connect("localhost","root","", "crud_php_2");


    if (!$my_sqli) {
        die("ERROR : " . mysqli_connect_errno());
    }