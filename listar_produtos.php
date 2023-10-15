<?php
include_once('conexao.php'); // Inclua o arquivo de conexão com o banco de dados
require_once('produtos.php'); // Verifique o caminho correto do arquivo
include("protect.php");
protect();

// Recupere todos os produtos do banco de dados
$query = "SELECT * FROM produtos";
$resultado = $mysqli->query($query);

if (!$resultado) {
    echo "Erro na consulta: " . $mysqli->error;
    exit();
}

$produtos = array();

while ($row = $resultado->fetch_assoc()) {
    $produto = new Produto($row['id'], $row['nome'], $row['preco'], $row['tipo'], $row['imagem']);
    $produtos[] = $produto;
}
?>

<?php
include_once('conexao.php'); // Inclua o arquivo de conexão com o banco de dados

if (isset($_GET['id'])) {
    $idProduto = $_GET['id'];
    $query = "SELECT imagem FROM produtos WHERE id = $idProduto";
    $resultado = $mysqli->query($query);

    if ($resultado && $resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $imagem = $row['imagem'];
               
        echo $imagem;
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Produtos</title>
</head>
<body>
<div class="body-container">
    <?php include 'header.php'; ?>
</div>
<div class="produtos">
    <h1>Lista de Produtos</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Tipo</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) : ?>
                <tr>
                    <td><?= $produto->getId(); ?></td>
                    <td><?= $produto->getNome(); ?></td>
                    <td><?= $produto->getPreco(); ?></td>
                    <td><?= $produto->getTipo(); ?></td>
                    <td><img height="100" src="<?= $produto->getImagem(); ?>" alt=""></td>
                    <td>
                        <a href="edit_produto.php?id=<?= $produto->getId(); ?>">Editar</a>
                        <a href="delete_produto.php?id=<?= $produto->getId(); ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <br>
    <a href="create_produto.php">Criar Produto</a>
</div>
<div class="d-flex">
    <a href="sair.php" class="btn btn-danger me-5">Sair</a>
</div>
</body>
</html>
