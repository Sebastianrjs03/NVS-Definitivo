<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

    $id = $_POST['id'];
    $totalCalificacion = $_POST['totalCalificacion'];
    $PromedioAceptacion = $_POST['PromedioAceptacion'];


    $consul = ("UPDATE calificacionfinal SET 
        totalCalificacion = :TC,
        PromedioAceptacion = :PA 
        WHERE idProducto = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':TC' => $totalCalificacion,
                   ':PA' => $PromedioAceptacion,
                   ':id' => $id]);

    header ('location: ../calificaciones_cliente_producto/calificacion_producto-Final.php')


?>