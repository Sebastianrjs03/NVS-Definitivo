<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

    $id = $_POST['id'];
    $numeroCalificacion = $_POST['numeroCalificacion'];
    $comentario = $_POST['comentario'];


    $consul = ("UPDATE calificacion SET 
        numeroCalificacion = :NCalificacion,
        comentarioCalificacion = :comentario 
        WHERE idProducto = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':NCalificacion' => $numeroCalificacion,
                   ':comentario' => $comentario,
                   ':id' => $id]);

    header ('location: ../calificacion_producto-Cliente.php')


?>