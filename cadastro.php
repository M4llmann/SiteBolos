<?php
session_start();

if (isset($_POST['submit'])) {
    include_once('conexao.php');
    
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $sobrenome = mysqli_real_escape_string($mysqli, $_POST['sobrenome']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

    $result = mysqli_query($mysqli, "INSERT INTO usuario (nome, sobrenome, email, senha) VALUES ('$nome', '$sobrenome', '$email', '$senha')");
    
    if ($result) {
        echo "<script>alert('Cadastro efetuado com sucesso'); location.href='login.php';</script>";
    } else {
        echo "Erro ao cadastrar usuário: " . mysqli_error($mysqli);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro</title>
    <link rel="stylesheet" href="./CSS/cadastro.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<link rel="stylesheet" href="./CSS/form.css">
<body>
    <div class="body-container">
        <?php include 'header.php'; ?>
    </div>
    <div class="box">
        <h1>Cadastro de Clientes</h1>
        <form action="cadastro_fornecedores.php" method="POST">
                    <input name="nome" type="text" placeholder="Nome">
                    <br><br>  
                    <input name="sobrenome" type="text" placeholder="Sobrenome">
                    <br><br>
                    <input name="email" type="text"  placeholder="E-Mail">
                    <br><br>
                    <input name="senha" type="password" placeholder="Senha">
                    <br><br>                                   
                    <input type="submit" name="submit" class="inputSubmit" value="Cadastrar">
                    <br><br>
        </form>
        
        <a>Já tenho cadastro! <a href="login.php">Login</a></a>
    </div>
</body>

</html>
