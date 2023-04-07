<?php

require_once 'entity/Produto.php';
require_once 'conexaoBanco.php';

criarAction();


//pegar as informações da request
function criarAction(){
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $datavalidade = $_POST['datavalidade'];

    $produtoNovo = new Produto($nome, $preco, $datavalidade);

    //insere no banco, trazendo resultado
    $resultado = repositoyCriarProduto($produtoNovo);

    //dado o resultado, mandar pro lugar certo com os dados certos
    if($resultado == false) {
        header('Location: formCriacao.php' . '?erro=Erro na inserção!');
        // var_export($statement->errorInfo());
    } else {
        header('Location: formCriacao.php' . '?sucesso=Produto inserido com sucesso!');
    }
}

//camada de acesso ao banco
//fazer a criacao do dado no banco
function repositoyCriarProduto($produtoNovo) {
    $conexao = getConexao();

    $sql = "insert into produtos (nome,preco,datavalidade) VALUES (:nome, :preco, :datavalidade);";
    $statement = $conexao->prepare($sql);

    $statement->bindValue('nome', $produtoNovo->getNome());
    $statement->bindValue('preco', $produtoNovo->getPreco());
    $statement->bindValue('datavalidade', $produtoNovo->getDatavalidade());

    $resultado = $statement->execute();
    return $resultado;
}


