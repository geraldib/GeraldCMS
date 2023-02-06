<?php

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "php_cms";


foreach ($db as $key => $value) {

    define(strtoupper($key), $value);
}


$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// if(isset($connection)){
//    echo "We are connected!";
//}else{
//    echo "Connection failure!";
//} 
