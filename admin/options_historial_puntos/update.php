<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

    $id = $_POST['id'];
    $puntosGenerados = $_POST['puntosGenerados'];


    $consul = ("UPDATE historialpuntos SET puntosGenerados = :puntosG WHERE pk_fk_Factura = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':puntosG' => $puntosGenerados, ':id' => $id]);

    header ('location: ../historial-puntos.php')


?>