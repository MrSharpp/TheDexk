<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'u990399034_sharp';
$db['db_pass'] = 'Sharp1194@#';
$db['db_name'] = 'u990399034_cms';

foreach( $db as $key => $value ){
    define(strtoupper($key),$value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$connection){ die(mysqli_error($connection)); }



?>