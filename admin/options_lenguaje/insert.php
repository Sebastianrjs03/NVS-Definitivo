<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$idlenguaje = $_POST['idlenguaje'];
$estadolenguaje = $_POST['estadolenguaje'];

$consul = "INSERT INTO `lenguaje`(`idLenguaje`, `estadoLenguaje`) VALUES (:idlenguaje, :estadolenguaje)";

$sql = $con->prepare($consul);  
$sql->execute([':idlenguaje' => $idlenguaje, ':estadolenguaje' => $estadolenguaje]);

header('location: ../productos/mod_lenguaje.php');

?>