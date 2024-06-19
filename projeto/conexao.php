<?php

//Essa tela serve para fazer a conexão do sistema com o banco de dados
$usuario = 'root';
$senha = '';
$database = 'ativi_integra';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->error) {
   die ("Erro ao conectar com o banco de dados: " . $mysqli->error);
}
