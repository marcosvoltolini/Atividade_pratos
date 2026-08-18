<?php
include "../infra/conexao.php";
$id = $_GET["id"];
//pega o valor do id através do do método GET.
$sql = "DELETE FROM Pratos WHERE id= ?";
//Aqui deleto os livros de onde pedir o id.
$stmt = mysqli_prepare($conexao, $sql);
//Prepara o comando SQL para ser executado com segurança.
mysqli_stmt_bind_param($stmt, "i", $id);
//essa parte coloca o valor de "$id" no "?".
mysqli_stmt_execute($stmt, "i", $id);
//Executa o comando SQL
mysqli_stmt_close($stmt);
//Fecha o Prepared Statement.
header("Location: ../index.php");
//volta para o index.php.
