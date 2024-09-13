<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

    $id = $_POST['id'];
    $totalPuntos = $_POST['puntosTotales'];


    $consul = ("UPDATE puntoscliente SET totalPuntos = :puntosT WHERE idPuntosCliente = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':puntosT' => $totalPuntos, ':id' => $id]);

    header ('location: ../mod_puntoscli.php')


?>