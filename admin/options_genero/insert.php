<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$idgenerojuego = $_POST['idgenerojuego'];
$estadogenero = $_POST['estadogenero'];

$consul = "INSERT INTO `generojuego`(`idGeneroJuego`, `estadoGeneroJuego`) VALUES (:idgenerojuego, :estadogenero)";

$sql = $con->prepare($consul);  
$sql->execute([':idgenerojuego' => $idgenerojuego, ':estadogenero' => $estadogenero]);

header('location: ../productos/mod_genero.php');

?>