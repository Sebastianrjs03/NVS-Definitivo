<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$idmarca = $_POST['idmarca'];
$estadomarca = $_POST['estadomarca'];

$consul = "INSERT INTO `marca`(`idMarca`, `estado_marca`) VALUES (:marca, :estadomarca)";

$sql = $con->prepare($consul);  
$sql->execute([':marca' => $idmarca, ':estadomarca' => $estadomarca]);

header('location: ../productos/mod_marca.php');

?>