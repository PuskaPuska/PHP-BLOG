<aside class="col-md-4">

    <div class="p3 mb-3 bg-warning rounded">
        <h4><b>Интересные факты</b></h4>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores aspernatur aut commodi cum eaque,
            est, explicabo, illo illum itaque mollitia necessitatibus nesciunt nostrum quisquam sunt! Dolorem maiores
            nostrum reprehenderit. </p>
    </div>
    <div class="p-3 mb-3">
        <img class="img-thumbnail" src="img/slon.jpg" alt="Картинка">
    </div>
<div id='alertMess'>
    <?php
    require './mysql_connect.php';

    $sql = 'SELECT * FROM `chat` ORDER BY `id` DESC';

    $query = $pdo->query($sql);


    $showMassage = function ($query){

        if ($query->rowCount() == 0) {
            echo "<div class=\"alert alert-warning mt-2\" id=\"emptyMess\">Пока нет сообщений</div>";
        }

        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            echo "<div class='alert alert-info' >
                    <p>$row->message</p>
              </div>";
        }
    };

    $showMassage($query);
    ?>

</div>
    <form action="" method="post">
        <label class="label"><input type="text" name="message" id="message" class="form-control"></label> </br>
        <div class="alert alert-danger mt-2" id="errorBlock"></div>
        <button type="button" id="chat_send" class="btn btn-success">
            Отправить
        </button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>


        setInterval(function(){
            $('#alertMess').load('../index.php #alertMess');
        }, 5000);


        $('#chat_send').click(function () {
            var message = $('#message').val();
            $.ajax({
                url: '../ajax/chat.php',
                type: 'POST',
                cache: false,
                data: {'message': message},
                dataType: 'html',
                success: function (data) {
                    if (data == "Готово") {
                        $('#errorBlock').hide();
                        $('#message').val('');
                        $('#alertMess').load('../index.php #alertMess');


                    } else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);
                    }
                }
            })

        });






    </script>
</aside>
