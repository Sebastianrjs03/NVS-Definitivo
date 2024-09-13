<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


    $id = $_POST['id'];

    $consul = ("DELETE FROM puntoscliente WHERE idPuntosCliente = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':id' => $id]);

    header ('location: ../mod_puntoscli.php')


?>