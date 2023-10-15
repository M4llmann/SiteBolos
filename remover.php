<?php
session_start();

if (isset($_GET['id'])) {
    $produto_id = $_GET['id'];

    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $key => $item) {
            if ($item['id'] == $produto_id) {
                unset($_SESSION['carrinho'][$key]);
                break;
            }
        }
    }
}

header('Location: carrinho.php');
?>
