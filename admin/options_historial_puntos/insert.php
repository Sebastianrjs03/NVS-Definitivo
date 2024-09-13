<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$pk_fk_Factura = $_POST['pk_fk_Factura'];
$idCliente = $_POST['idCliente'];
$puntosGenerados = $_POST['puntosGenerados'];

$consul = ("INSERT INTO historialpuntos (pk_fk_Factura, idCliente, puntosGenerados)   VALUES (:factura, :cliente, :puntos)");

try {
    $sql = $con->prepare($consul);


    $sql->execute([
        ':factura' => $pk_fk_Factura,
        ':cliente' => $idCliente,
        ':puntos' => $puntosGenerados
    ]);

    header('Location: ../puntos_cliente/historial-puntos.php');
    exit; 

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>