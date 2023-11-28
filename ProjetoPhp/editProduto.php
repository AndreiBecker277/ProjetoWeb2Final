<?php
include_once 'config/config.php';
include_once 'classes/CrudProduto.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $crud = new CrudProduto($db);
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];
    $categoria = $_POST['categoria'];
    
    $crud->create($nome, $preco,$descricao, $imagem, $categoria);
    echo 'editado com sucesso';
    header('refresh:2,home.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $crud = new CrudProduto($db);
    $data = $crud->readEdit($id);
    $row = $data->FETCH(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <h1>EDITAR PRODUTO</h1>
    <form method="POST">
    <input type="text" name="nome" placeholder="Insira o nome do produto" required>
        <input type="decimal" name="preco" placeholder="Insira o preço" required>
        <input type="text" name="descricao" placeholder="Insira a descrilão" required>
        <input type="img" name="imagem" placeholder="Insira a foto do produto " required>
        <input type="submit" value="salvar">
    </form>
</body>

</html> 