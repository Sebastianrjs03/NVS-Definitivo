<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


    $id = $_POST['id'];


    $consul = ("DELETE FROM `generojuego` WHERE idGeneroJuego = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':id' => $id]);

    header ('location: ../productos/mod_genero.php')


?>