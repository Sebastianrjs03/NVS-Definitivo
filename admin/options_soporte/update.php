<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $pqrs = $_POST['pqrs'];


    $consul = ("UPDATE soporte SET 
        fecha = :fecha,
        pqrs = :pqrs 
        WHERE idCliente = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':fecha' => $fecha,
                   ':pqrs' => $pqrs,
                   ':id' => $id]);

    header ('location: ../soporte/mod_soporte.php')


?>