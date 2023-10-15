<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolo Di Moça</title>
</head>
    
<body>
<div class="header">
    <div class="logo">
        <a href="home.php"><img class="img-logo" src="./imagens/Logo.png" alt="Bolo Di Moça"></a>
    </div>
        <div class="lista">   
        <ul>
            <li class="dropdown">
                <a href="#">Produtos</a>
                <ul class="submenu">
                    <li><a href="bolos.php">Bolos</a></li>
                    <li><a href="doces.php">Doces</a></li>
                    <li><a href="sobremesas.php">Sobremesas</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="login">
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        

        if (isset($_SESSION['usuario'])) {
            // Se houver uma sessão ativa (usuário logado), exiba o botão "Sair"
            echo '<a href="./logout.php"><button class="meu-botao">Sair</button></a>';
        } else {
            // Caso contrário, exiba os botões "Entrar" e "Criar Cadastro"
            echo '<a href="./login.php"><button class="meu-botao">Entrar</button></a>';
            echo '<a href="./cadastro.php">Criar Cadastro</a>';
        }
        ?>
        <a href="./cadastro_fornecedores.php">Fornecedores</a>
    </div>  
</div>
</body>
</html>
