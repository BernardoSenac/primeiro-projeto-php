<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php

    session_start();

    if (!isset($_SESSION['logado']))
    {
        header('location: telaLogin.php');
    }

    $arquivo = fopen('products.csv', 'r');

    $produtos = [];

    while ($linha = fgetcsv($arquivo))
    {
        $arrayLinha = explode(';', $linha[0]);
        
        $produto = [
            'codigo' => $arrayLinha[0],
            'descricao' => str_replace('"', '', $arrayLinha[1]),
            'preco' => $arrayLinha[2],
        ];

        array_push($produtos, $produto);
    }

    fclose($arquivo);

?>
<body>
    <?php
        require 'menu.html';
    ?>
    <h1>Produtos</h1>
    <table>
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td><?php echo $produto['preco']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>