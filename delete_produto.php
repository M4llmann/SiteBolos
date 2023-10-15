<?php
include_once('conexao.php'); // Inclua o arquivo de conexão com o banco de dados
require_once('produtos.php'); // Verifique o caminho correto do arquivo

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Exclua o produto do banco de dados
    $query = "DELETE FROM produtos WHERE id='$id'";

    if ($mysqli->query($query)) {
        // Redirecione para a página de listagem de produtos ou exiba uma mensagem de sucesso
        header('Location: listar_produtos.php');
        exit();
    } else {
        echo "Erro ao excluir o produto: " . $mysqli->error;
    }
} else {
    // ID de produto não fornecido, redirecione ou exiba uma mensagem de erro
    header('Location: listar_produtos.php');
    exit();
}
?>
