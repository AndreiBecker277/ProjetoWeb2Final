<?php
include_once 'config/config.php';
include_once 'classes/CrudProduto.php';
$crud = new CrudProduto($db);
$data = $crud->read();
?>

<!DOCTYPE html>
<html>

<head>

    <title>Produto</title>
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


    <div class="organizar">
       

        <?php

        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="box">
                <img src="<?php echo $row['imagem']; ?>." width="80px;" height="80px;" alt="Image" />
                <?php echo "<h3> " . $row['nome'] . " </h3> " ?>
                <?php echo "<h2> R$ " . $row['preco'] . " </h2> " ?>
               
                <button><a href="comProduto.php?id=<?php echo $row['id']; ?>"> Comprar</a></button>
            </div>

        <?php } ?>


    </div>
   
    <footer><img src="./uploads/instagram.png" alt="">
        <img src="./uploads/facebook.png" alt="">
        <h1>Site Realizado Pelos Monobolas</h1>
    </footer>
</body>

</html>