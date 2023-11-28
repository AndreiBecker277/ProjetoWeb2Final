<?php
include_once("Config/config.php");
include_once("Classes/Crud.php");
if(isset($_GET['id'])) {
$id= $_GET['id'];
$crud= new Crud($db);
$crud->delete($id); 
echo "registro excluido c/ sucesso ";
header('refresh:2,home.php');
exit();
}