<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de pessoas</title>
    <link rel="stylesheet" href="style.css">
</head>
    <?php
    session_start();

    if (!isset($_SESSION['logado']))
    {
        header('location: telaDePessoas.php');
    }

?>
<body>
<?php
        require 'menu.html';
    ?>
    <h1>Cadastro de Pessoas</h1>
    <form action="controller.php" method="post">
        <label for="nome">Nome:</label>
        <br>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="senha">Senha:</label>
        <br>
        <input type="password" name="senha" id="senha" step="any" required>
        <br>
        <label for="senha">Idade:</label>
        <br>
        <input type="number" name="idade" id="idade" step="any" required>
        <br>
        <label for="nome">Sexo:</label>
        <br>
        <select name="sexo" id="sexo">
            <option value="">Selecione...</option>
            <option value="F">Feminino</option>
            <option value="M">Masculino</option>
        </select>
        <br>
        <input type="hidden" name="acao" id="acao" value="Cadastrar">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>