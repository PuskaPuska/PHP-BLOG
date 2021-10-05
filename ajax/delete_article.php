<?php

require_once '../mysql_connect.php';

$id = $_POST['id'];
echo $id;

$sql = 'DELETE FROM `articles` WHERE `articles`.`id` = :id ';

$query = $pdo->prepare($sql);
$query->execute(['id' => $id]);