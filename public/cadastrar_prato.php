<?php
include "../infra/conexao.php";

$nome = $_POST["nome_prato"];
$descricao = $_POST["descri"];
$categoria = $_POST["categoria"];
$preco = $_POST["preco"];
$nome_usuario = $_POST["nome_usuario"];

$sql = "SELECT id FROM usuarios WHERE nome= ?";

$stmt = mysqli_prepare($conexao,$sql);

mysqli_stmt_bind_param($stmt,"s", $nome_usuario);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

$usuario = mysqli_fetch_assoc($resultado);

mysqli_stmt_close($stmt);

if (!$usuario) {
    die("Usuário não encontrado.");
}
$usuario_id = $usuario["id"];

$sql = "INSERT INTO Pratos (nome, descricao,preco,categoria, usuario_id)VALUES (?, ?, ?, ? ,?)";

$stmt = mysqli_prepare ($conexao, $sql);

if ($stmt) {
    mysqli_stmt_bind_param(
        $stmt,
        "ssdsi",
        $nome,
        $descricao,
        $categoria,
        $preco,

    );
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

}

header("Location: ../index.php");
exit();

?>