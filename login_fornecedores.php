<?php

include("conexao.php");

if (!isset($_SESSION)) {
    session_start();
}

$erro = array();

if (isset($_POST['email']) && strlen($_POST['email']) > 0) {

    $_SESSION['email'] = $mysqli->escape_string($_POST['email']);
    $_SESSION['senha'] = $mysqli->escape_string($_POST['senha']);

    $sql_code = "SELECT senha, id FROM fornecedores WHERE email = '$_SESSION[email]'";
    $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
    $dado = $sql_query->fetch_assoc();
    $total = $sql_query->num_rows;

    if ($total == 0) {
        $erro[] = "Este email não pertence a nenhum usuário.";
    } else {
        if ($dado['senha'] == $_SESSION['senha']) {
            $_SESSION['fornecedor'] = $dado['id'];
        } else {
            $erro[] = "Senha Incorreta.";
        }
    }

    if (count($erro) == 0 || !isset($erro)) {
        echo "<script>alert('Login efetuado com sucesso'); location.href='listar_produtos.php';</script>";
    }
}
?>

<html>
<head><meta charset="UTF-8"></head>
<link rel="stylesheet" href="./CSS/form.css">
<body>
<div class="body-container">
        <?php include 'header.php'; ?>
    </div>
    <?php
    if (count($erro) > 0) {
        foreach ($erro as $msg) {
            echo "<p>$msg</p>";
        }
    }
    ?>
    <div class="box">
    <h1>Acesso Fornecedores</h1>
    <form method="POST" action="">
        <input name="email" placeholder="E-mail" type="text">
        <br><br>
        <input name="senha" placeholder="Senha" type="password">
        <br><br>
        <input class="inputSubmit" value="Entrar" type="submit">
    </form>
    </div>
</body>
</html>
