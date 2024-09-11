<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $senombre = $_POST['senombre'];
    $apellido = $_POST['apellido'];
    $seapellido = $_POST['seapellido'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $contrasena = $_POST['contraseña'];

    $consul = ("UPDATE usuario SET nombreUsuario = :nombre, senombreUsuario = :senombre,
    apellidoUsuario = :apellido, seapellidoUsuario = :seapellido, correoUsuario = :correo, celularUsuario = :celular,
     contrasenaUsuario = :contrasena WHERE idUsuario = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':nombre' => $nombre, 'senombre' => $senombre, ':apellido' => $apellido, 'seapellido' => $seapellido,
    ':correo' => $correo, ':celular' => $celular, ':contrasena' => $contrasena, ':id' => $id]);

    header ('location: ../indexadmin.php')


?>