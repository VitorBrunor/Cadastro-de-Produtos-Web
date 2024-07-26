<?php

// Obs: usei o XAMPP para conseguir rodar o PHP na web. com isso, funciona apenas com esse caminho: http://localhost:8080/Cadastro_Lista/
// Favor testar mudando a porta de conexão, se possível

include 'functions.php';

// Listar todos os produtos do arquivo de texto
$listaProdutos = listarProdutos();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Listagem de Produtos</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Valor</th>
        </tr>
        <?php foreach ($listaProdutos as $produto): ?>
            <tr>
                <td><?php echo htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>R$ <?php echo number_format($produto['valor'], 2, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="btn-container">
        <a href="cadastrar_produto.php">Cadastrar Novo Produto</a>
    </div>
</body>
</html>
