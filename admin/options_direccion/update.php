<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

    $id = $_POST['id'];
    $direccion = $_POST['direccion'];
    $complemento = $_POST['complemento'];


    $consul = ("UPDATE direccion SET 
        direccion = :dir,
        complemento = :com 
        WHERE fk_pk_Cliente = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':dir' => $direccion,
                   ':com' => $complemento,
                   ':id' => $id]);

    header ('location: ../direccion/mod_direccion.php')


?>