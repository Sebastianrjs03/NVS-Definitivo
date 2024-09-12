<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$estadoenvio = $_POST['estadoenvio'];
$estadoe = $_POST['estadoe'];

$consul = "INSERT INTO `estadoenvio`(`idEstadoEnvio`, `estadoEnvio`) VALUES (:estadoenvio, :estadoe)";

$sql = $con->prepare($consul);  
$sql->execute([':estadoenvio' => $estadoenvio, ':estadoe' => $estadoe]);

header('location: ../envios/mod_estadoenvio.php');

?>
