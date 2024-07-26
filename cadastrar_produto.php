<?php

// Obs: usei o XAMPP para conseguir rodar o PHP na web. com isso, funciona apenas com esse caminho: http://localhost:8080/Cadastro_Lista/
// Favor testar mudando a porta de conexão, se possível

include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $disponivel = $_POST['disponivel'];

    // Adicionar produto ao arquivo de texto
    if (adicionarProduto($nome, $descricao, $valor, $disponivel)) {
        header("Location: listar_produtos.php");
        exit();
    } else {
        echo "Erro ao adicionar o produto.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Cadastro de Produto</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="descricao">Descrição do Produto:</label>
        <textarea id="descricao" name="descricao"></textarea>

        <label for="valor">Valor do Produto:</label>
        <input type="number" step="0.01" id="valor" name="valor" required>

        <label for="disponivel">Disponível para venda:</label>
        <select id="disponivel" name="disponivel">
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select>

        <input type="submit" value="Cadastrar Produto">
    </form>
    <div class="btn-container">
        <a href="listar_produtos.php">Voltar para Listagem</a>
    </div>
</body>
</html>
