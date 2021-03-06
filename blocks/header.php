<!doctype html>
<html lang="ru" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="/img/iconphp.ico">
    <link rel="stylesheet" href="/css/main.css">
    <title><?= $website_title ?></title>
</head>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">PHP Blog</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a href="/" class="p-2 text-dark">Главная</a>
    <?php
    if ($_COOKIE['login'] == 'admin') :
        ?>
        <a href="/users.php" class="p-2 text-dark">Список пользователей</a>
    <?php
    endif;
    ?>
    <a href="/contact.php" class="p-2 text-dark">Контакты</a>
        <?php if($_COOKIE['login'] != "")
            echo ' <a href="/article.php" class="p-2 text-dark">Добавить статью</a>'?>
    </nav>
    <?php
    if ($_COOKIE['login'] == '') :
        ?>
        <a class="btn btn-outline-primary mr-2 mb-2" href="/auth.php">Войти</a>
        <a class="btn btn-outline-primary mb-2" href="/reg.php">Регистрация</a>

    <?php
    else:
        ?>
        <a href="/auth.php" class="btn btn-outline-primary mb-2">Кабинет пользователя</a>

    <?php
    endif;
    ?>

</div>
