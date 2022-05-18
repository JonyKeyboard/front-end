<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "cursophp";

$conn = new mysqli($host, $user, $pass, $db);

//ASSUNTO DA AULA
$nome = "Suporte alto de microfone";
$descricao = "O suporte é novo e foi fabricado em South Korea";

$stmt = $conn->prepare("INSERT INTO itens (nome, descricao) VALUES (?,?)");

$stmt->bind_param("ss", $nome, $descricao); // s = string, i = integer, d = double

$stmt->execute();