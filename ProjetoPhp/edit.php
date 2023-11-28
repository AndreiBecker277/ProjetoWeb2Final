<?php
include_once("Config/config.php");
include_once("Classes/Crud.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $crud = new Crud($db);
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];
    
    $crud->create($nome, $email,$endereco, $senha);
    echo 'editado com sucesso';
    header('refresh:2,produto.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $crud = new Crud($db);
    $data = $crud->readEdit($id);
    $row = $data->FETCH(PDO::FETCH_ASSOC);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <h1>EDITAR USUARIO</h1>
    <form method="POST">
    <input type="text" name="nome" placeholder="Insira o nome " required>
        <input type="email" name="email" placeholder="Insira o email " required>
        <input type="text" name="endereco" placeholder="Insira o endereço " required>
        <input type="password" name="senha" placeholder="Insira a Senha " required>
        <input type="submit" value="editar ">
    </form>
</body>

</html>  