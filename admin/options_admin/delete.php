<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


    $id = $_POST['id'];

    $consul = ("DELETE FROM administrador WHERE idAdministrador = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':id' => $id]);

    header ('location: ../indexadmin.php')


?>