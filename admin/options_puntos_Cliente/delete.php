<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


    $id = $_POST['id'];

    $consul = ("DELETE FROM puntoscliente WHERE idPuntosCliente = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':id' => $id]);

    header ('location: ../puntos_cliente/mod_puntoscli.php')


?>