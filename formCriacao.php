<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Criar Produto</h1>

        <?php include ('menu.html') ?>

        <form action="criar.php" method="post">
            Nome: <input type="text" name="nome" id=""><br><br>
            Preço: <input type="number" name="preco" id=""><br><br>
            Data Validade: <input type="date" name="datavalidade" id=""><br><br>
            <input class="btn btn-success" type="submit" value="Criar"><br><br>
        </form>
        <?php
            echo $_GET['erro'] ?? '';
            echo $_GET['sucesso'] ?? '';
        ?>
    </div>
</body>
</html>