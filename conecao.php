<?php 
$host = 'localhost';     // Endereço do servidor MySQL
$dbname = 'trabalhofacubanco';   // Nome do banco de dados
$username = 'root'; // Nome de usuário do banco de dados
$password = ''; // Senha do banco de dados

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>