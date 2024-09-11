<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $contrasena = $_POST['contraseña'];

    $consul = ("UPDATE clientes SET nombreCliente = :nombre,
    apellidoCliente = :apellido, correoCliente = :correo, celularCliente = :celular,
     contrasenaCliente = :contrasena WHERE idCliente = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':nombre' => $nombre, ':apellido' => $apellido,
    ':correo' => $correo, ':celular' => $celular, ':contrasena' => $contrasena, ':id' => $id]);

    header ('location: ../indexadmin.php')


?>