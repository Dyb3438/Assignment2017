<?php
$dbms = 'mysql';
$host = 'localhost';
$dbName = 'winter_holiday_present';
$user = 'root';
$pass = '';
$dsn = "$dbms:host=$host;dbname=$dbName";
$dbh = new PDO($dsn, $user, $pass);
$dbh->query('set names utf8');

?>