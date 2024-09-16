<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$nombre = $_POST['nombre'];
$senombre = $_POST['senombre'];
$apellido = $_POST['apellido'];
$seapellido = $_POST['seapellido'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$contrasena = $_POST['contraseña'];




$consul = ("INSERT INTO usuario (nombreUsuario, senombreUsuario,
    apellidoUsuario, seapellidoUsuario, correoUsuario, celularUsuario,
     contrasenaUsuario)   VALUES (:nombre, :senombre, :apellido,:seapellido, :correo, 
:celular, HEX(aes_encrypt(:contrasena, 'llave')))");

$sql = $con->prepare($consul);

$sql->execute([':nombre' => $nombre, 'senombre' => $senombre, ':apellido' => $apellido, 'seapellido' => $seapellido,
    ':correo' => $correo, ':celular' => $celular, ':contrasena' => $contrasena]);

header ('location: ../indexadmin.php')

?>