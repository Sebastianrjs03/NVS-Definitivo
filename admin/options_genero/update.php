<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$idgenerojuego = $_POST['idgenerojuego'];
$id = $_POST['id'];
$estadogenero = $_POST['estadogenero'];


$consul = "UPDATE generojuego SET idGeneroJuego = :idgenerojuego, estadoGeneroJuego = :estadogenero WHERE idGeneroJuego = :id";

$sql = $con->prepare($consul);


$sql->execute([':idgenerojuego' => $idgenerojuego, ':estadogenero' => $estadogenero, ':id' => $id]);

header('location: ../productos/mod_genero.php');

?>
