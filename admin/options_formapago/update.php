<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


if (isset($_POST['estadoMetodoPago'], $_POST['id'])) {
    $idFormaPago = $_POST['id'];
    $estadoMetodoPago = $_POST['estadoMetodoPago'];

    $consul = "UPDATE formapago SET estadoMetodoPago = :estadoMetodoPago WHERE idFormaPago = :idFormaPago";

    $sql = $con->prepare($consul);


    $resultado = $sql->execute([
        ':estadoMetodoPago' => $estadoMetodoPago,
        ':idFormaPago' => $idFormaPago
    ]);

}

        header('Location: ../formaPago/indexformapago.php');

?>
