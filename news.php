<body class="d-flex flex-column h-100">

<?php

require_once 'mysql_connect.php';

$sql = 'SELECT * FROM `articles` WHERE `id` = :id  ';

$get = $_GET['id'];
$query = $pdo->prepare($sql);
$query->execute(['id' => $get]);

$article = $query->fetch(PDO::FETCH_OBJ);

$website_title = 'Blog: ' . $article->title;

require_once 'blocks/header.php';


?>

<main role="main" class="container mt-5">
    <div class="row mb-3">
        <div class="col-md-7 mb-3 mr-3">
            <div class="jumbotron">
                <h1><?= $article->title ?></h1>
                <p><b>Автор статьи: </b>
                    <mark><?= $article->author ?></mark>
                </p>
                <?php
                $date = date('d ', $article->date);
                $array = ["Января ", "Февраля "];
                $date .= $array[date('n', $article->date) - 1];
                $date .= date('H:i', $article->date);
                ?>
                <p><b>Время публикации: </b>
                    <?= $date ?>
                </p>

                <p class="text-justify">
                    <?= $article->intro ?>
                    <br>
                    <br>
                    <?= $article->text ?>

                </p>
            </div>

            <h3>Комментарии</h3>
            <form action="/news.php?id=<?= $_GET['id'] ?>" method="post">
                <label for="username">Ваше имя</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= $_COOKIE['login'] ?>">

                <label for="mess">Сообщение</label>
                <textarea type="text" name="mess" id="mess" class="form-control"></textarea>

                <div class="alert alert-danger mt-2" id="errorBlock"></div>
                <button type="submit" id="mess_send" class="btn btn-success mt-5">
                    Добавить комментарий
                </button>
            </form>

            <?php
            if ($_POST['username'] != '' && $_POST['mess'] != '') {
                $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
                $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

                $sql = 'INSERT INTO comments(name, mess, article_id) VALUES(?,?,?)';
                $article_id = $_GET['id'];
                $query = $pdo->prepare($sql);
                $query->execute([$username, $mess, $article_id]);
            }

            $sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';

            $query = $pdo->prepare($sql);
            $query->execute(['id' => $_GET['id']]);

            $comments = $query->fetchAll(PDO::FETCH_OBJ);

            foreach ($comments as $comment) {
                echo "<div class='alert alert-info mb-20'>
                    <h4>$comment->name</h4>
                    <p>$comment->mess</p>

                        </div>";
            }

            ?>

        </div>
        <?php require_once 'blocks/aside.php'; ?>

    </div>
</main>


<?php require_once 'blocks/footer.php'; ?>
</body>
</html>
