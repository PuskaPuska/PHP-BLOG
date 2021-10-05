<?php
/*Подключение Базы Данных*/
$user = 'admin';
$password = '020899';
$db = 'testing';
$host = 'localhost';

$dsn = 'mysql:host=' . $host . ';dbname=' . $db;

$pdo = new PDO($dsn, $user, $password);

?>