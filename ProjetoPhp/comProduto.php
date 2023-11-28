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

    $crud->create($nome, $preco, $descricao, $imagem, $categoria);
    echo 'editado com sucesso';
    header('refresh:2,produto.php');
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
    <title>Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
        }

        h2 {
            text-align: center;
            font-size: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            margin-right: 10px;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .edit {
            background-color: #4caf50;
            color: white;
        }

        .delete {
            background-color: #f44336;
            color: white;
        }

        .register {
            background-color: #2196f3;
            color: white;
        }
    </style>
</head>


<body>
    <h1>COMPRA PRODUTO</h1>
    <div>

        <h1> <?php echo $row['nome']; ?> </h1>
        <h1> <?php echo $row['preco']; ?> </h1>
        <h2> <?php echo $row['descricao']; ?> </h2>
        <h1> <img src="<?php echo $row['imagem']; ?>." width="120px;"  height="120px;" alt="Image"/> </h1>

    </div>
    </form>
</body>

</html>