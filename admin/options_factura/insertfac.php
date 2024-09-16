<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$idFactura = $_POST['idFactura'];
$fechaFactura = $_POST['fechaFactura'];
$iva = $_POST['iva'];
$base = $_POST['base'];
$totalCompra = $_POST['totalCompra'];
$descontarPuntos = $_POST['descontarPuntos'];
$descuentoGenerado = $_POST['descuentoGenerado'];
$idCliente = $_POST['idCliente'];
$idPuntosCliente = $_POST['idPuntosCliente'];
$idFormaPago = $_POST['idFormaPago'];
$fk_pk_direccion = $_POST['fk_pk_direccion'];


$consul = "INSERT INTO factura (idFactura, fechaFactura, iva, base, totalCompra, descontarPuntos, descuentoGenerado, idCliente, idPuntosCliente, idFormaPago, fk_pk_direccion)
           VALUES (:idFactura, :fechaFactura, :iva, :base, :totalCompra, :descontarPuntos, :descuentoGenerado, :idCliente, :idPuntosCliente, :idFormaPago, :fk_pk_direccion)";

$sql = $con->prepare($consul);
$sql->execute([
    ':idFactura' => $idFactura,
    ':fechaFactura' => $fechaFactura,
    ':iva' => $iva,
    ':base' => $base,
    ':totalCompra' => $totalCompra,
    ':descontarPuntos' => $descontarPuntos,
    ':descuentoGenerado' => $descuentoGenerado,
    ':idCliente' => $idCliente,
    ':idPuntosCliente' => $idPuntosCliente,
    ':idFormaPago' => $idFormaPago,
    ':fk_pk_direccion' => $fk_pk_direccion,
]);


header('Location: ../factura.php');

?>


