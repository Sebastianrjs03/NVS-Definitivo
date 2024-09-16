<?php

require '../config/database.php';

$db = new Database();
$con = $db->conectar();


$idFormaPago = $_POST['idFormaPago'];
$estadoMetodoPago = $_POST['idFormaPago'];

$consul = "INSERT INTO estadoMetodoPago (idFormaPago, estadoMetodoPago)
           VALUES (:idFormaPago, :esatdoMetodoPago)";

$sql = $con->prepare($consul);
$sql->execute([
    ':idFormaPago' => $idFormaPago,
    'estadoMetodoPago' => $estadoMetodoPago,
]);


header('Location: ../indexformapago.php');

?>


