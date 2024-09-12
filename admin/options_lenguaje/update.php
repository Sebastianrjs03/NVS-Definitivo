<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$idlenguaje = $_POST['idlenguaje'];
$id = $_POST['id'];
$estadolenguaje = $_POST['estadolenguaje'];


$consul = "UPDATE lenguaje SET idLenguaje = :idlenguaje, estadolenguaje = :estadolenguaje WHERE idLenguaje = :id";

$sql = $con->prepare($consul);


$sql->execute([':idlenguaje' => $idlenguaje, ':estadolenguaje' => $estadolenguaje, ':id' => $id]);

header('location: ../productos/mod_lenguaje.php');

?>
