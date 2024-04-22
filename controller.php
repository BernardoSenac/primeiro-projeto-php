<?php
    $acao = $_POST['acao'];

    if ($acao === 'entrar')
    {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];


        $arquivo = fopen('pessoas.csv', 'r');

        $pessoas = [];
    
        while ($linha = fgetcsv($arquivo)) {
            $arrayLinha = explode(';', $linha[0]);
            $pessoa = [
                'codigo' => $arrayLinha[0],
                'nome' => $arrayLinha[1],
                'senha' => $arrayLinha[2],
                'idade' => $arrayLinha[3],
                'sexo' => $arrayLinha[4]
            ];
        array_push($pessoas, $pessoa);
        }
    
        $usuarioEncontrado = false;

        foreach ($pessoas as $pessoa) {
            if ($usuario == $pessoa['nome'] && $senha == $pessoa['senha']){
                $usuarioEncontrado = true;
                break;
            }
        }
        session_start();

        if ($usuarioEncontrado == true)
        {
            $_SESSION['logado'] = true;
            
            header('location: telaProdutos.php');
            exit;
        }
        else
        {
            header('location: telaLogin.php');
        }

        exit();
    }
    elseif ($acao === 'Cadastro de Produto'){
    $descricao = $_POST['descricao'];
    $descricao = str_replace('"', '', $descricao);
    $valor = number_format($_POST['preco'], 2, '.', '.');
    $preco = strval(("R$ {$valor}"));
    $preco = str_replace('"', '', $preco);

    $arquivo = fopen('products.csv', 'r');

    $produtos = [];

    while ($linha = fgetcsv($arquivo)) {
        $ArrayLinha = explode(';', $linha[0]);
        $produto = [
            'codigo' => $ArrayLinha[0],
            'descricao' => $ArrayLinha[1],
            'preco' => $ArrayLinha[2]
        ];
    array_push($produtos, $produto);
    }

    fclose($arquivo);

    $arquivo = fopen('products.csv', 'a');

    $produto = [
        count($produtos) + 1,
        $descricao,
        $preco
    ];

    fputcsv($arquivo, $produto, ";");

    fclose($arquivo);

    header('Location: telaProdutos.php');
    exit();
    }
    
    elseif ($acao === 'Cadastrar') 
    {
        $nome = $_POST['nome'];
        $senha = floatval($_POST['senha']);
        $idade = floatval($_POST['idade']);
        $sexo = $_POST['sexo'];

        $arquivo = fopen('pessoas.csv', 'r');

        $pessoas = [];
    
        while ($linha = fgetcsv($arquivo))
        {
            $arrayLinha = explode(';', $linha[0]);
            
            $pessoa = [
                'codigo' => $arrayLinha[0],
                'nome' => $arrayLinha[1],
                'senha' => $arrayLinha[2],
                'idade' => $arrayLinha[3],
                'sexo' => $arrayLinha[4],
            ];
    
            array_push($pessoas, $pessoa);
        }
    
        fclose($arquivo);

        $arquivo2 = fopen('pessoas.csv', 'a');

        $pessoa = [
            count($pessoas) + 1,
            $nome,
            $senha,
            $idade,
            $sexo,
        ];

        fputcsv($arquivo2, $pessoa, ';');

        fclose($arquivo2);

        header('Location: telaDePessoas.php');
        exit();
    }
?>