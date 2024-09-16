<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


    $id = $_POST['id'];

    $consul = ("DELETE FROM historialpuntos WHERE pk_fk_Factura = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':id' => $id]);

    header ('location: ../puntos_cliente/historial-puntos.php')


?>