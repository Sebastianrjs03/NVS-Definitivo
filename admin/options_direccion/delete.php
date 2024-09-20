<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


    $id = $_POST['id'];

    $consul = ("DELETE FROM direccion WHERE fk_pk_Cliente = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':id' => $id]);

    header ('location: ../direccion/mod_direccion.php')


?>