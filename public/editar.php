<?php
require "../infra/conexao.php";

if (isset($_POST["id"])) {

    $id          = $_POST["id"];
    $nome        = $_POST["nome"];
    $descricao   = $_POST["descricao"];
    $categoria = $_POST["categoria"];
    $preco       = $_POST["preco"];
    $usuario_id  = $_POST["usuario_id"];

    $sql = "UPDATE pratos
            SET nome = '$nome', descricao = '$descricao', categoria = '$categoria', preco = '$preco', usuario_id = '$usuario_id'
            WHERE id = $id";

    if (mysqli_query($conexao, $sql)) {
        echo "Prato atualizado com sucesso! <a href='listar.php'>Ver pratos</a>";
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conexao);
    }

    exit;
}

$id = $_GET["id"];

$sql = "SELECT * FROM pratos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);
$prato = mysqli_fetch_assoc($resultado);

$sql_usuarios = "SELECT * FROM usuarios";
$usuarios = mysqli_query($conexao, $sql_usuarios);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Prato</title>
</head>
<body>

<h1>Editar Prato</h1>

<form method="POST" action="editar.php">

    <input type="hidden" name="id" value="<?php echo $prato["id"]; ?>">

    Nome do prato: <br>
    <input type="text" name="nome" value="<?php echo $prato["nome"]; ?>" required><br><br>

    Descrição: <br>
    <textarea name="descricao"><?php echo $prato["descricao"]; ?></textarea><br><br>

    Categoria: <br>
    <input type="text" name="categoria" value="<?php echo $prato["categoria"]; ?>" required><br><br>

    Preço: <br>
    <input type="number" step="0.01" name="preco" value="<?php echo $prato["preco"]; ?>" required><br><br>

    Cadastrado por: <br>
    <select name="usuario_id" required>
        <?php while ($u = mysqli_fetch_assoc($usuarios)) { ?>
            <option value="<?php echo $u["id"]; ?>"
                <?php if ($u["id"] == $prato["usuario_id"]) echo "selected"; ?>>
                <?php echo $u["nome"]; ?>
            </option>
        <?php } ?>
    </select><br><br>

    <button type="submit">Salvar alterações</button>
</form>

<a href="listar.php">Voltar</a>

</body>
</html>