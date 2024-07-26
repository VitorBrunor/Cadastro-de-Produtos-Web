<?php

// Obs: usei o XAMPP para conseguir rodar o PHP na web. com isso, funciona apenas com esse caminho: http://localhost:8080/Cadastro_Lista/
// Favor testar mudando a porta de conexão, se possível 

function adicionarProduto($nome, $descricao, $valor, $disponivel) {
    $produto = "$nome|$descricao|$valor|$disponivel";
    $file = 'produtos.txt';

    $fp = fopen($file, 'a');
    if ($fp) {
        fwrite($fp, $produto . PHP_EOL); // Escreve o produto no arquivo
        fclose($fp); // Fecha o arquivo
        return true; // Indica que o produto foi adicionado com sucesso
    } else {
        return false; // Retorna false em caso de erro na abertura do arquivo
    }
}

function listarProdutos() {
    $produtos = [];
    $file = 'produtos.txt';

    $fp = fopen($file, 'r');
    if ($fp) {
        while (!feof($fp)) {
            $linha = fgets($fp);
            if (!empty($linha)) {
                list($nome, $descricao, $valor, $disponivel) = explode('|', $linha);
                $produtos[] = [
                    'nome' => $nome,
                    'descricao' => $descricao,
                    'valor' => $valor,
                    'disponivel' => $disponivel
                ];
            }
        }
        fclose($fp); 

        usort($produtos, function($a, $b) {
            return (float) $a['valor'] - (float) $b['valor'];
        });
    }

    return $produtos; 
}

?>
