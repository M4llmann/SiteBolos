<?php
    include_once('conexao.php');

class Fornecedor {
    private $id;
    private $nome;
    private $endereco;
    private $telefone;
    // Outras propriedades...

    // Construtor
    public function __construct($id, $nome, $endereco, $telefone) {
        $this->id = $id;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    // Métodos para interagir com o banco de dados
    public function salvarNoBanco() {
        // Implemente o código para inserir ou atualizar o fornecedor no banco de dados
    }

    public function excluirDoBanco() {
        // Implemente o código para excluir o fornecedor do banco de dados
    }

    public static function buscarPorId($id) {
        // Implemente o código para buscar um fornecedor pelo ID no banco de dados
    }

    // Outros métodos conforme necessário...
}
?>
