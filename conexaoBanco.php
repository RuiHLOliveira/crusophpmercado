<?php


/**
 * Cria e retorna uma conexao de PDO
 * @return PDO
 */
function getConexao() : PDO
{
    //dados para conexao
    $host = 'localhost';
    $user = 'postgres';
    $password = '123456';
    $port = '5432';
    
    $dbname = 'cursophpmercado';


    //string de conexao formatada
    $string = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password;";
    //cria a conexao pdo
    $conexao = new PDO($string);

    //retorna pra ser usada
    return $conexao;
}