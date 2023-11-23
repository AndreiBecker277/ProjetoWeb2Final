<?php
class CrudProduto
{
    private $conn;
    private $table_name = "tbproduto";
    
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function create($nome, $preco, $descricao ,$imagens)
    {
      
        $query = "INSERT INTO " . $this->table_name . " (nome, preco, descricao, imagem) VALUES (?,?,?,?)";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nome, $preco, $descricao ,$imagens]);
        return $stmt;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function readEdit($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }
    public function update($id, $nome , $preco, $descricao ,$imagens)
    {
        $query = "UPDATE " . $this->table_name . " SET nome = ? preco = ? descricao = ? imagens = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nome,  $preco, $descricao ,$imagens, $id]);
        return $stmt;
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }
}