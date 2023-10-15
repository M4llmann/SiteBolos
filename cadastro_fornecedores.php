<?php
if(isset($_POST['submit']))
    {    
        include_once('conexao.php');
        
        $nome_fornecedor = $_POST['nome_fornecedor'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];

        $result = mysqli_query($mysqli, "INSERT INTO fornecedores(nome_fornecedor, senha, email, endereco) VALUES ('$nome_fornecedor', '$senha', '$email', '$endereco')");
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
        <h1>Cadastro de Fornecedores</h1>
        <form action="cadastro_fornecedores.php" method="POST">
                    <input name="nome_fornecedor" type="text" placeholder="Nome">
                    <br><br>                  
                    <input name="senha" type="password" placeholder="Senha">
                    <br><br>
                    <input name="email" type="text"  placeholder="E-Mail">
                    <br><br>
                    <input name="endereco" type="text" placeholder="Endereço">
                    <br><br>                
                    <input type="submit" name="submit" class="inputSubmit" value="Cadastrar">
                    <br><br>
        </form>
        
        <a>Já tenho cadastro! <a href="login_fornecedores.php">Login</a></a>
    </div>
</body>

</html>
