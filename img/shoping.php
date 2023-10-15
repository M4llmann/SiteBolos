<?php

$connect = mysqli_connect("localhost","root","","ar");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoping</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/
    bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center">Lista de Produtos</h2>

                    <?php

                    $query = "SELECT * FROM produtos";
                    $result = mysqli_query($connect,$query);


                    while ($row = mysqli_fetch_array($result)) {?>

                            <form method="get" action="shoping.php?id=<?=$row['id'] ?>">
                                    <img src="img/<?= $row['imagem'] ?>" style="height: 150px;">
                                    <h2><?= $row['nome']; ?></h2>
                                    <h2><?= $row['preco']; ?></h2>
                            </form>
                    <?php }


                        ?>
                </div>
                <div class="col-md-6">
                    <h2 class="text-center">Item Selecionado</h2>
                </div>
            </div>

        </div>

    </div>
</body>
</html>