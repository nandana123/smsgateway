<?php

// koneksi ke database

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'gammu';

mysql_connect($dbhost, $dbuser, $dbpass) or die("ggaal konek");
mysql_select_db($dbname) or die("gagal");

?>