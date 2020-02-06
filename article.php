<?php
if ($_COOKIE['login'] == '') {
    header('Location: /reg.php');
    exit();
}
?>
<body class="d-flex flex-column h-100">

<?php
$website_title = 'Добавление статьи';
require_once 'blocks/header.php';


?>

<main role="main" class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <h4><?= $website_title ?></h4>
            <form action="" method="post">
                <label for="title">Заголовок статьи</label>
                <input type="text" name="title" id="title" class="form-control">

                <label for="intro">Интро статьи</label>
                <textarea name="intro" class="form-control" id="intro"></textarea>

                <label for="text">Текст статьи</label>
                <textarea name="text" class="form-control" id="text"></textarea>

                <div class="alert alert-danger mt-2" id="errorBlock"></div>
                <button type="button" id="article_send" class="btn btn-success mt-5">
                    Добавить
                </button>
            </form>
        </div>


    </div>
</main>


<?php require_once 'blocks/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    $('#article_send').click(function () {
        var title = $('#title').val();
        var intro = $('#intro').val();
        var text = $('#text').val();

        $.ajax({
            url: '/ajax/add_article.php',
            type: 'POST',
            cache: false,
            data: {'title': title, 'intro': intro, 'text': text},
            dataType: 'html',
            success: function (data) {
                if (data == "Готово") {
                    $('#article_send').text('Все готово');
                    $('#errorBlock').hide();
                    $('#title').val('');
                    $('#intro').val('');
                    $('#text').val('');
                } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                }
            }
        })

    });

</script>
</body>
</html>
