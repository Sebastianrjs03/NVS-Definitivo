<?php

require '../config/database.php';

$db = new Database();
$con = $db->conectar();


if (isset($_POST['formapago'], $_POST['idFormaPago'])) {
    $idFormaPago = $_POST['idFormaPago'];
    $estadoMetodoPago = $_POST['estadoMetodoPago'];

    $consul = "UPDATE formapago SET idFormaPago = :idFormaPago, 
              estadoMetodoPago = :estadoMetodoPago WHERE estadoMetodoPago = :estadoMetodoPago";

    $sql = $con->prepare($consul);


    $resultado = $sql->execute([
        ':idFormaPago' => $idFormaPago,
        ':estadoMetodoPago' => $estadoMetodoPago,
    ]);

    if ($resultado) {
        header('Location: ../indexformapago.php');
    } else {
        echo "Error: No se pudo actualizar la forma de pago.";
    }
} else {
    echo "Error: Faltan datos para actualizar la forma de pago.";
}

?>
