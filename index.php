<body class="d-flex flex-column h-100">

<?php

$website_title = 'PHP Blog';
require_once 'blocks/header.php';


?>

<main role="main" class="container mt-5">
    <div class="row mb-3">
        <div class="col-md-7 mb-3 mr-3">
            <?php
            require_once 'mysql_connect.php';

            $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';

            $query = $pdo->query($sql);

            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                echo "<h2>$row->title</h2>
                        <p class='text-justify'>$row->intro</p>  
                        <p>Автор статьи: $row->author</p>
                        <a href='/news.php?id=$row->id' title ='$row->title'>
                        <button class='btn btn-warning'>Прочитать больше</button>
                    </a>";
            }


            ?>
        </div>
        <?php require_once 'blocks/aside.php'; ?>

    </div>
</main>


<?php require_once 'blocks/footer.php'; ?>
</body>
</html>
