<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


    $id = $_POST['id'];


    $consul = ("DELETE FROM `marca` WHERE idMarca = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':id' => $id]);

    header ('location: ../productos/mod_marca.php')


?>