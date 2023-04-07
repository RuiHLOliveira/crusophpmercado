<?php

require_once "conexaoBanco.php";

//conectar com banco
$conexao = getConexao();

/*
//buscar os produtos existentes
$sql = 'select * from produtos';
$statement = $conexao->prepare($sql); //preparar o statement
$statement->execute();
$listaProdutos = $statement->fetchAll(PDO::FETCH_ASSOC);

$meuProduto = null;
foreach ($listaProdutos as $key => $produto) {
    if($produto['id'] == $_GET['idProduto']){
        $meuProduto = $produto;
    }
}
*/

//buscar os produtos existentes
$sql = 'select * from produtos where id = :id';
$statement = $conexao->prepare($sql); //preparar o statement
$statement->bindValue('id', $_GET['idProduto']);
$statement->execute();
$meuProduto = $statement->fetch(PDO::FETCH_ASSOC);

// $meuProduto = null;
// foreach ($listaProdutos as $key => $produto) {
//     if($produto['id'] == $_GET['idProduto']){
//         $meuProduto = $produto;
//     }
// }

$meuProduto['datavalidade'] = substr($meuProduto['datavalidade'], 0, 10);

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
        <h1>Editar Produto</h1>

        <?php include ('menu.html') ?>
        
        <form action="editar.php" method="post">
            Nome: <input type="text" name="nome" id="" value="<?php echo $meuProduto['nome']; ?>"><br><br>
            Preço: <input type="number" name="preco" id="" value="<?php echo $meuProduto['preco']; ?>"><br><br>
            Data Validade: <input type="date" name="datavalidade" id="" value="<?php echo $meuProduto['datavalidade']; ?>"><br><br>
            <input class="btn btn-success" type="submit" value="Salvar">
        </form>
        <?php
            echo $_GET['erro'] ?? '';
            echo $_GET['sucesso'] ?? '';
        ?>
    </div>
</body>
</html>