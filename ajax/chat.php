<?php
$message = trim(filter_var($_POST['message'], FILTER_SANITIZE_STRING));


$error = '';

if (strlen($message) < 1) {
    $error = 'Введите сообщение не менее 1 символа';
} else if (strlen($message) > 255) {
    $error = 'Введите сообщение не более 255 символов';
}


if ($error != '') {
    echo $error;
    exit();
}

require_once '../mysql_connect.php';


$sql = 'INSERT INTO chat(message) VALUES(?)';

$query = $pdo->prepare($sql);
$query->execute([$message]);

echo 'Готово';

?>