<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


$id = $_POST['id'];
$idDesarrollador = $_POST['idDesarrollador'];
$estadoDesarrollador = $_POST['estadoDesarrollador'];


$consul = "UPDATE desarrollador SET idDesarrollador = :idDesarrollador, 
estadoDesarrolador = :estadoDesarrollador  WHERE idDesarrollador = :id";

$sql = $con->prepare($consul);


$sql->execute([':estadoDesarrollador' => $estadoDesarrollador, ':idDesarrollador' => $idDesarrollador, ':id' => $id]);

header('location: ../productos/mod_desarrollador.php');

?>
