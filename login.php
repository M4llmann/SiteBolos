<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$erro = array();

if (isset($_POST['email']) && strlen($_POST['email']) > 0) {
    include("conexao.php");

    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

    // Evite SQL Injection usando instruções preparadas
    $stmt = $mysqli->prepare("SELECT senha, id FROM usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        $erro[] = "Este email não pertence a nenhum usuário.";
    } else {
        $stmt->bind_result($hashed_password, $id);
        $stmt->fetch();

        if ($hashed_password == $senha) {
            $_SESSION['usuario'] = $id;
        } else {
            $erro[] = "Senha Incorreta.";
        }
    }

    $stmt->close();

    if (empty($erro)) {
        echo "<script>alert('Login efetuado com sucesso'); location.href='home.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/form.css">
    <title>Login</title>
</head>
<body>
<div class="body-container">
    <?php include 'header.php'; ?>
</div>
<div class="container">
    <?php
    if (!empty($erro)) {
        echo "<div class='erro-container'>";
        foreach ($erro as $msg) {
            echo "<p class='erro-msg'>$msg</p>";
        }
        echo "</div>";
    }
    ?>
    <div class="box">
        <h1>Acesso Clientes</h1>
        <form method="POST" action="">
            <input name="email" placeholder="E-mail" type="email" required>
            <br><br>
            <input name="senha" placeholder="Senha" type="password" required>
            <br><br>
            <input class="inputSubmit" value="Entrar" type="submit">
        </form>
        <p>Não possui uma conta? <a href="cadastro.php">Crie uma aqui</a></p>
    </div>
</div>
</body>
</html>
