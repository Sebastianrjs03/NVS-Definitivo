<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


$idFormaPago = $_POST['idFormaPago'];
$estadoLenguaje = $_POST['estadoLenguaje'];

$consul = "INSERT INTO formapago (idFormaPago, estadoLenguaje)
           VALUES (:idFormaPago, :estadoLenguaje)";

$sql = $con->prepare($consul);
$sql->execute([
    ':idFormaPago' => $idFormaPago,
    ':estadoLenguaje' => $estadoLenguaje,
]);


header('Location: ../indexadmin.php');

?>


