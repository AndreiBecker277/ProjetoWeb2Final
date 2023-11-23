<?php
include_once("./Config/config.php");
include_once("./Classes/CrudFeedback.php");
$crudFeedback = new CrudFeedback($db);
$data = $crudFeedback->read();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud = new CrudFeedback($db);
    $nome = $_POST['nome'];
    $feedback = $_POST['feed'];
    $crud->create($nome, $feedback);
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
    <link rel="stylesheet" href="./css/feed.css">
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
            <div class="fundoForm">
                <h4>Seu Apelido</h4>
                <input type="text" name="nome" placeholder="Insira o seu nome " required><br>

                <h4>O que achou do site?</h4>

                <input type="text" name="feed" placeholder="Insira o eu Feedback " required><br><br>

                <input type="submit" id="botaofeed" value="Feedback">
            </div>
           
        </form>
        <div class="org">
        <?php


        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        ?>
            
                <div class="opiniao">

                    <?php echo $row['nome'] . ":"; ?>
                    <?php echo $row['feedback']; ?>


                </div>
            
        <?php } ?></div>
    </main>
    <footer><img src="./uploads/instagram.png" alt="">
        <img src="./uploads/facebook.png" alt="">
        <h1>Site Realizado Pelos Monobolas</h1>
    </footer>
</body>

</html>