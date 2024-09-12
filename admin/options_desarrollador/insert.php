<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$idDesarrollador = $_POST['idDesarrollador'];
$estadoDesarrollador = $_POST['estadoDesarrollador'];

$consul = "INSERT INTO `desarrollador`(`idDesarrollador`, `estadoDesarrolador`) VALUES (:idDesarrollador, :estadoDesarrollador)";

$sql = $con->prepare($consul);  
$sql->execute([':idDesarrollador' => $idDesarrollador, ':estadoDesarrollador' => $estadoDesarrollador]);

header('location: ../productos/mod_desarrollador.php');

?>
