<?php
include_once('conexao.php'); // Inclua o arquivo de conexão com o banco de dados
require_once('produtos.php'); // Verifique o caminho correto do arquivo
include("protect.php");

if (isset($_SESSION['fornecedor'])) {
    // Se estiver logado como fornecedor, mostre o botão "Criar Produto"
    echo '<a href="create_produto.php">Criar Produto</a>';
}

// Recupere todos os produtos do tipo "Bolos" do banco de dados
$query = "SELECT * FROM produtos WHERE tipo = 'Bolos'";
$resultado = $mysqli->query($query);

if (!$resultado) {
    echo "Erro na consulta: " . $mysqli->error;
    exit();
}

$bolos = array();

while ($row = $resultado->fetch_assoc()) {
    $produto = new Produto($row['id'], $row['nome'], $row['preco'], $row['tipo'], $row['imagem']);
    $bolos[] = $produto;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Bolos</title>
    <style>
        .produtos {
            width: 80%;
            margin: 0 auto;
            /* Isso centraliza o conteúdo horizontalmente */
            text-align: center;
        }

        .produto {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Espaçamento entre os produtos */
        }

        .produtos-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .produto-item {
            border: 1px solid #ccc;
            padding: 10px;
            width: calc(25% - 10px);
            box-sizing: border-box;
            border-radius: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Distribui o espaço verticalmente */
        }

        .produto-img {
            width: 100%;
            height: 300px;
            border-radius: 10px;
        }

        .produto-nome {
            font-weight: bold;
        }

        .comprar-btn {
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 5px 0;
            border-radius: 5px;
            margin-top: 10px;
            width: 100%;
            /* O botão agora terá a mesma largura da div do produto */
        }

        .comprar-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="body-container">
        <?php include 'header.php'; ?>
    </div>
    <div class="produtos">
        <h1>Lista de Produtos</h1>
        <div class="produtos-container">
            <?php foreach ($bolos as $produto) : ?>
                <div class="produto-item">
                    <img class="produto-img" src="<?= $produto->getImagem(); ?>" alt="">
                    <p><?= $produto->getNome(); ?></p>
                    <p>Preço: R$ <?= number_format($produto->getPreco(), 2, ',', '.'); ?></p>
                    
                    <!-- Formulário dentro do loop para adicionar o produto correto -->
                    <form method="POST" action="carrinho.php">
                        <input type="hidden" name="produto_id" value="<?= $produto->getId(); ?>">
                        <input type="hidden" name="produto_nome" value="<?= $produto->getNome(); ?>">
                        <input type="hidden" name="produto_preco" value="<?= $produto->getPreco(); ?>">
                        <input type="hidden" name="produto_tipo" value="<?= $produto->getTipo(); ?>">
                        <input type="hidden" name="acao" value="adicionar">
                        <button type="submit" class="comprar-btn">Adicionar ao Carrinho</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
        <br>
        <br>
        <a href="create_produto.php">Criar Produto</a>
    </div>

    <div class="d-flex">
    <a href="sair.php" class="btn btn-danger me-5">Sair</a>
</div>
</body>

</html>
