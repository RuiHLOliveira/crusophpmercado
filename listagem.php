<?php
require_once "conexaoBanco.php";

//conectar com banco
$conexao = getConexao();

//buscar os produtos existentes
$sql = 'select * from produtos';
$statement = $conexao->prepare($sql); //preparar o statement
$statement->execute();
$listaProdutos = $statement->fetchAll(PDO::FETCH_ASSOC);

//exibir eles - no html

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
        <h1>Produtos</h1>
        <?php include ('menu.html') ?>
        <table class="table">
            <thead>
                <th>Cod</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </thead>
            <tbody>
            <?php
                foreach ( $listaProdutos as $key => $produto) {
                    echo "<tr>";
                    echo "<td>$produto[id]</td>";
                    echo "<td>$produto[nome]</td>";
                    echo "<td>$produto[preco]</td>";
                    echo "<td><a class='btn btn-primary' href='formEdicao.php?idProduto=$produto[id]'>Editar</a></td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>