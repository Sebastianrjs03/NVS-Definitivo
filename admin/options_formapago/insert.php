<?php

require '../config/database.php';

$db = new Database();
$con = $db->conectar();


$idFormaPago = $_POST['formapago'];
$estadoMetodoPago = $_POST['formapago'];

$consul = "INSERT INTO formapago (idFormaPago, estadoMetodoPago)
           VALUES (:idFormaPago, :estadoMetodoPago)";

$sql = $con->prepare($consul);
$sql->execute([
    ':idFormaPago' => $idFormaPago,
    ':estadoMetodoPago' => $estadoMetodoPago,
]);


header('Location: ../indexformapago.php');

?>


