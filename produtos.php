<?php
include_once('conexao.php'); // Certifique-se de incluir seu arquivo de conexão

class Produto {
    private $id;
    private $nome;
    private $preco;
    private $tipo;
    private $imagem;

    public function __construct($id, $nome, $preco, $tipo, $imagem) {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->tipo = $tipo;
        $this->imagem = $imagem;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getImagem() {
        return $this->imagem;
    }

    // Método para salvar o produto no banco de dados
    public function salvar() {
        global $conn; // Certifique-se de que $conn esteja disponível globalmente

        // Evitar SQL Injection usando declarações preparadas
        $sql = "INSERT INTO produtos (nome, preco, tipo, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $this->nome, $this->preco, $this->tipo, $this->imagem);

        if ($stmt->execute()) {
            return true; // Produto salvo com sucesso
        } else {
            return false; // Erro ao salvar o produto
        }
    }
// Método estático para buscar todos os produtos do banco de dados
public static function listarProdutos() {
    global $conn; // Certifique-se de que $conn esteja disponível globalmente

    $query = "SELECT * FROM produtos";
    $resultado = $conn->query($query);

    $produtos = array();

    if ($resultado) {
        while ($row = $resultado->fetch_assoc()) {
            $produto = new Produto($row['id'], $row['nome'], $row['preco'], $row['tipo'], $row['imagem']);
            $produtos[] = $produto;
        }
    }

    return $produtos;
}

    // Implemente outros métodos para buscar por ID, listar todos os produtos, etc.
}
?>
