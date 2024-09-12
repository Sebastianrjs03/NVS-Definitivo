<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$documento = $_POST['documento'];
$tdoc = $_POST['tdoc'];
$idUsuario = $_POST['idUsuario'];

$consul = ("INSERT INTO administrador (idAdministrador,documentoAdministrador, pf_fk_tdoc)   
VALUES (:idAdministrador, :documento, :tdoc)");
$sql = $con->prepare($consul);
$sql -> bindParam (':idAdministrador', $idUsuario);
$sql -> bindParam (':documento', $documento);
$sql -> bindParam(':tdoc', $tdoc);
$sql -> execute();



header ('location: ../usuarios/admin.php');

?>