<?php
$servidor = 'sql541.main-hosting.eu';
$usuario = 'u668629163_glamourstore';
$senha = '250858Banco';
$banco = 'u668629163_glamourstoreSi';

//INTANCIAMOS A CLASSE PARA ACESSAR O BANCO
$mysqli = new mysqli($servidor, $usuario, $senha, $banco);

//Verifica se houve erro
if ($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}