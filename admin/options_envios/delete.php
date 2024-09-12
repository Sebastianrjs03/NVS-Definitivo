<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


    $id = $_POST['id'];


    $consul = ("DELETE FROM `envios` WHERE fk_pk_Factura = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':id' => $id]);

    header ('location: ../envios/mod_envio.php')


?>