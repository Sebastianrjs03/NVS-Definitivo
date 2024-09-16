<?php

require '../config/database.php';

$db = new Database();
$con = $db->conectar();

if (isset($_POST['idFormaPago'])) {
    $idFormaPago = $_POST['id'];

    $consul = "DELETE FROM formapago WHERE idFormaPago = :id";

    $sql = $con->prepare($consul);
    $sql->execute([':idFormaPago' => $idFormaPago]);

    header('Location: ../indexformapago.php');
    exit();
    
} else {
    echo "Error: No se ha proporcionado el ID del metodo de pago para eliminar.";
}

?>

