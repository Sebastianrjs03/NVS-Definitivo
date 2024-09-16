<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $valorUnitario = $_POST['valorUnitario'];
    $iva = $_POST['iva'];
    $total = $_POST['total'];


    $consul = ("UPDATE detallefactura SET 
        cantidadProducto = :cantidad,
        valorUnitarioProducto = :valorUnitario, 
        ivaProducto = :iva, 
        totalProducto = :total 
        WHERE fk_pk_Factura = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':cantidad' => $cantidad,
                   ':valorUnitario' => $valorUnitario,
                   ':iva' => $iva,
                   ':total' => $total,
                   ':id' => $id]);

    header ('location: ../detalles_factura/detalle_factura.php')


?>