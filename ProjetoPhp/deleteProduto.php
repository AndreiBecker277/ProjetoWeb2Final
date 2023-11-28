<?php
include_once("Config/config.php");
include_once("Classes/CrudProduto.php");
if(isset($_GET['id'])) {
$id= $_GET['id'];
$crud= new CrudProduto($db);
$crud->delete($id); 
echo "registro excluido c/ sucesso ";
header('refresh:2,produto.php');
exit();
}