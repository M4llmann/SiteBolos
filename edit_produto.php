<?php
include_once('conexao.php'); // Inclua o arquivo de conexão com o banco de dados
require_once('produtos.php'); // Verifique o caminho correto do arquivo

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    // Processar o formulário de edição de produto
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    // Atualize o produto no banco de dados
    $query = "UPDATE produtos SET nome='$nome', preco='$preco' WHERE id='$id'";

    if ($mysqli->query($query)) {
        // Redirecione para a página de listagem de produtos ou exiba uma mensagem de sucesso
        header('Location: listar_produtos.php');
        exit();
    } else {
        echo "Erro ao editar o produto: " . $mysqli->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Recupere as informações do produto com base no ID
    $query = "SELECT * FROM produtos WHERE id='$id'";
    $resultado = $mysqli->query($query);

    if (!$resultado || $resultado->num_rows === 0) {
        // Produto não encontrado, redirecione ou exiba uma mensagem de erro
        header('Location: listar_produtos.php');
        exit();
    }

    $row = $resultado->fetch_assoc();
    $nome = $row['nome'];
    $preco = $row['preco'];
} else {
    // ID de produto não fornecido, redirecione ou exiba uma mensagem de erro
    header('Location: listar_produtos.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>
    <form method="POST" action="">
        <!-- Campos do formulário para editar o produto -->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?= $nome; ?>" required><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" value="<?= $preco; ?>" required><br>

        <input type="submit" value="Salvar Alterações">
    </form>
    <a href="listar_produtos.php">Voltar para a lista de produtos</a>
</body>
</html>
