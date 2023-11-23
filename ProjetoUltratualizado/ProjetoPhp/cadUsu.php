<?php
include_once("Config/config.php");
include_once("Classes/Crud.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud = new Crud($db);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];   
    $crud->create($nome, $email,$endereco,$senha,);
    echo 'Registro salvo com sucesso!!';
    header('refresh:3,index.php');
    exit();
} ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadatro</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <header>
        <img src="./uploads/logoIdBit.png" alt="">
        <h1>IdBit</h1>
        <ul>

            <li>Home</li>
            <li>Login</li>
            <li>Cadastro</li>
            <li>FeedBack</li>
            <li>Vender</li>

        </ul>
    </header>
    <main class="container">
        <form method="POST">
            <h2>Nome:</h2>
            <input type="text" name="nome" placeholder="Insira o nome " required>
            <h2>Email:</h2>
            <input type="email" name="email" placeholder="Insira o email " required>
            <h2>Endereço:</h2>
            <input type="text" name="endereco" placeholder="Insira o endereço " required>
            <h2>Senha:</h2>
            <input type="password" name="senha" placeholder="Insira a Senha " required>
            <div class="botao">
            <input type="submit" value="Cadastrar!">
            </div>
        </form>
    </main>
    <footer><img src="./uploads/instagram.png" alt="">
<img src="./uploads/facebook.png" alt="">
<h1>Site Realizado Pelos Monobolas</h1></footer>
</body>

</html>