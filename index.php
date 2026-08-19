<?php

include "infra/conexao.php";
$Pratos = mysqli_query($conexao, "SELECT * FROM Pratos");
$Usuarios = mysqli_query($conexao, "SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade_Pratos</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>

<h2>Cadastre um novo usuário</h2>
<form action="public/cadastrar_usuario.php" method="POST">

<label>Nome:</label>
<input type="text" name="nome_usuario" required>
<br>

<label>Email:</label>
<input type="text" name="email" required>
<br>

<button type="submit">Cadastrar usuario</button>

</form>

    <header>
        <h1>Atividade_Pratos</h1>
    </header>
    <main>
        <h2>Adicione um novo Prato!</h2>
        <form action="public/cadastrar.php" method="POST">
            <label for="prato">Nome do prato:</label>
            <input type="text" name="prato">
            <br>
            <label for="Descri">Descrição:</label>
            <input type="text" name="descri">
            <br>
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria">
            <br>
            <label for="preco">Preço:</label>
            <input type="number" name="preco">
            <br>
            <button type="submit">Cadastrar Prato</button>
        </form>
        <div>
            <h2>Pratos Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
                <?php while ($Pratos = mysqli_fetch_assoc($Pratos)) { ?>
                    <tr>
                        <td><?php echo $Pratos["id"] ?></td>
                        <td><?php echo $Pratos["nome"] ?></td>
                        <td><?php echo $Pratos["descri"] ?></td>
                        <td><?php echo $Pratos["categoria"] ?></td>
                        <td><?php echo $Pratos["preco"] ?></td>
                        <td>
                            <a href="public/editar.php?id=<?php echo $Pratos["id"] ?>">Editar</a>
                            <a href="public/excluir.php?id=<?php echo $Pratos["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </main>
    <footer>

    </footer>


</body>

</html>