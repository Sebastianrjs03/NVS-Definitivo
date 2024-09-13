<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

if (isset($_POST['id'], $_POST['fechaFactura'], $_POST['iva'], $_POST['base'], $_POST['totalCompra'], $_POST['descontarPuntos'], $_POST['descuentoGenerado'])) {
    $id = $_POST['id'];
    $fechaFactura = $_POST['fechaFactura'];
    $iva = $_POST['iva'];
    $base = $_POST['base'];
    $totalCompra = $_POST['totalCompra'];
    $descontarPuntos = $_POST['descontarPuntos'];
    $descuentoGenerado = $_POST['descuentoGenerado'];

    $consul = "UPDATE factura SET  
              fechaFactura = :fechaFactura, iva = :iva,
              base = :base, totalCompra = :totalCompra,
              descontarPuntos = :descontarPuntos,
              descuentoGenerado = :descuentoGenerado WHERE idFactura = :id";

    $sql = $con->prepare($consul);


    $resultado = $sql->execute([
        ':id' => $id,
        ':fechaFactura' => $fechaFactura,
        ':iva' => $iva,
        ':base' => $base,
        ':totalCompra' => $totalCompra,
        ':descontarPuntos' => $descontarPuntos,
        ':descuentoGenerado' => $descuentoGenerado,
    ]);


    if ($resultado) {

        header('Location: ../factura.php');

        echo "Error: No se pudo actualizar el pedido.";
    }
} else {

    echo "Error: Faltan datos para actualizar el pedido.";
}

?>
