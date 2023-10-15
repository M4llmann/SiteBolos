<?php
include("protect_cli.php");
protect();


if (isset($_POST['acao']) && $_POST['acao'] === 'adicionar') {
    $produto_id = $_POST['produto_id'];
    $produto_nome = $_POST['produto_nome'];
    $produto_preco = $_POST['produto_preco'];

    // Verifica se o carrinho já existe na sessão
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

    // Adiciona o produto ao carrinho
    $_SESSION['carrinho'][] = array(
        'id' => $produto_id,
        'nome' => $produto_nome,
        'preco' => $produto_preco
    );
}

if (isset($_GET['acao']) && $_GET['acao'] === 'limpar') {
    // Limpa o carrinho
    unset($_SESSION['carrinho']);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/carrinho.css" />
    <title>Carrinho de Compras</title>
</head>
<body>
<div class="body-container">
        <?php include 'header.php'; ?>
    </div>
    <h1>Carrinho de Compras</h1>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
                foreach ($_SESSION['carrinho'] as $item) {
                    echo "<tr>";
                    echo "<td>{$item['nome']}</td>";
                    echo "<td>R$ " . number_format($item['preco'], 2, ',', '.') . "</td>";
                    echo "<td><a href='remover.php?id={$item['id']}'>Remover</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>O carrinho está vazio.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <p>Total: R$ <?php
    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        $total = 0;
        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['preco'];
        }
        echo number_format($total, 2, ',', '.');
    } else {
        echo '0,00';
    }
    ?></p>
    <p><a href="carrinho.php?acao=limpar">Limpar Carrinho</a></p>
    <p><a href="bolos.php">Continuar Comprando</a></p>
    <p><a href="#">Finalizar Compra</a></p>
</body>
</html>
