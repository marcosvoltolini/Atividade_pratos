<?php

include "../infra/conexao.php";

$nome = $_POST["nome_usuario"];
$email = $_POST["email"];

$sql = "INSERT INTO usuarios (nome,email) VALUES (?,?)";