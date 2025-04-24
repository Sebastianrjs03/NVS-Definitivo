<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"));
$correo = $data->email ?? '';
$contrasena = $data->contrasena ?? '';

require '../../../config/database.php';
$conexionDB = new Database();
$conexion = $conexionDB->conectar();

// Consultamos si el correo existe
$sql = "SELECT contrasenaUsuario FROM usuario WHERE correoUsuario = ?";
$sentencia = $conexion->prepare($sql);
$sentencia->execute([$correo]);
$usuario = $sentencia->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo json_encode(["success" => false, "message" => "Correo no registrado"]);
    exit;
}

if ($usuario['contrasenaUsuario'] === $contrasena) {
    echo json_encode(["success" => true, "message" => "Inicio de sesión exitoso"]);
} else {
    echo json_encode(["success" => false, "message" => "Contraseña incorrecta"]);
}
?>
