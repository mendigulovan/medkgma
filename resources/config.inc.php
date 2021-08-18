<?php

$conn['db_host']  = 'localhost';
$conn['db_user']  = 'root';
$conn['db_pass']  = '';
$conn['db_name']  = 'medcentr';

foreach($conn as $k => $v){
    define(strtoupper($k),$v);
}
