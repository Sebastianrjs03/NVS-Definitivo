<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


if (isset($_POST['idFormaPago'], $_POST['estadoLenguaje'])) {
    $idFormaPago = $_POST['idFormaPago'];
    $estadoLenguaje = $_POST['estadoLenguaje'];

    $consul = "UPDATE formapago SET idFormaPago = :idFormaPago, 
              estadoLenguaje = :estadoLenguaje WHERE idFormaPago = :idFormaPago";

    $sql = $con->prepare($consul);


    $resultado = $sql->execute([
        ':idFormaPago' => $idFormaPago,
        ':estadoLenguaje' => $estadoLenguaje,
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
