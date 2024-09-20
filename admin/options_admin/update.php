<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


    $id = $_POST['id'];
    $documento = $_POST['documento'];
    $tipoDoc = $_POST['tdoc'];
    $contrasena = $_POST['contrasena'];

    $consul = ("UPDATE administrador SET 
    documentoAdministrador = :documento,
    pf_fk_tdoc = :tipoDoc WHERE idAdministrador = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':documento' => $documento, ':tipoDoc' => $tipoDoc, ':id' => $id]);

    $consul = ("UPDATE usuario SET contrasenaUsuario = :contrasena WHERE idUsuario = :id");

    $sql = $con->prepare($consul);
    $sql->execute([':contrasena' => $contrasena, ':id' => $id]);

    $consul = ("UPDATE usuario SET contrasenaUsuario = HEX(aes_encrypt(:contrasena, 'llave')) WHERE idUsuario = :id");

    $sql = $con->prepare($consul);

    $sql->execute([':contrasena' => $contrasena, ':id' => $id]);

    header ('location: ../usuarios/admin.php');


?>