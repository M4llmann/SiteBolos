<?php
include_once('conexao.php'); // Inclua o arquivo de conexão com o banco de dados
include("protect.php");
protect();

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $tipo = $_POST["tipo"];
    
   
    if(isset($_FILES['arquivo'])){
        $arquivo = $_FILES['arquivo'];

        if($arquivo['error'])
            die("Falha ao enviar arquivo");

    $pasta = "img/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
if (!in_array($extensao, ["jpg", "jpeg", "png"])) {
    die("Tipo de arquivo não aceito. Apenas JPG, JPEG e PNG são permitidos.");
}


    
    
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $pasta . $novoNomeDoArquivo . "." . $extensao);    
        
    }
    
        $sql = "INSERT INTO produtos (nome, preco, tipo, imagem) VALUES (?, ?, ?, ?)";
        
        $stmt = $mysqli->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ssss", $nome, $preco, $tipo, $path);
            
            if ($stmt->execute()) {
                echo "Produto adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar o produto: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            echo "Erro de preparação da consulta: " . $mysqli->error;
        }
    } else {
        echo "Erro no upload da imagem.";
    }
    
    // Feche a conexão com o banco de dados (se necessário)
    // $mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inserir Produto</title>
</head>
<body>
<div class="body-container">
    <?php include 'header.php'; ?>
</div>
<h1>Inserir Produto</h1>
<div class="box"> <!-- Adicione a div com a classe "box" aqui -->
    <form action="create_produto.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" required><br><br>

        <label for="tipo">Tipo de Produto:</label>
        <select name="tipo">
            <option value="Bolos">Bolos</option>
            <option value="Doces">Doces</option>
            <option value="Sobremesas">Sobremesas</option>
        </select>
<br><br>

        <label for="imagem">Imagem:</label>
        <input type="file" name="arquivo" accept="image/*" required><br><br>

        <input type="submit" value="Salvar">
    </form>
</div>
</body>
</html>
