<?php

class Produto {
    private $id;
    private $nome;
    private $preco;
    private $datavalidade;

    public function __construct($nome, $preco, $datavalidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->datavalidade = $datavalidade;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function getDatavalidade() {
        return $this->datavalidade;
    }
}