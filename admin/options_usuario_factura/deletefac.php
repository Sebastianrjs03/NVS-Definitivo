<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $consul = "DELETE FROM factura WHERE idFactura = :id";

    $sql = $con->prepare($consul);
    $sql->execute([':id' => $id]);

    header('Location: ../factura.php');
    exit();
    
} else {
    echo "Error: No se ha proporcionado el ID de la factura para eliminar.";
}

?>

