<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$idmarca = $_POST['idmarca'];
$id = $_POST['id'];
$estadomarca = $_POST['estadomarca'];


$consul = "UPDATE marca SET idMarca = :idmarca, estado_marca = :estadomarca WHERE idMarca = :id";

$sql = $con->prepare($consul);


$sql->execute([':idmarca' => $idmarca, ':estadomarca' => $estadomarca, ':id' => $id]);

header('location: ../productos/mod_marca.php');

?>
