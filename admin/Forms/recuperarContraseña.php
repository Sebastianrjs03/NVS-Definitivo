<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

$conexion = new mysqli("localhost", "usuario_db", "contraseña_db", "nombre_db");

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->email)) {
    echo json_encode(["success" => false, "message" => "Correo no enviado."]);
    exit;
}

$email = $conexion->real_escape_string($data->email);

// Verifica si existe
$query = "SELECT * FROM usuarios WHERE correoUsuario = '$email'";
$result = $conexion->query($query);

if ($result->num_rows === 0) {
    echo json_encode(["success" => false, "message" => "No existe cuenta con ese correo."]);
    exit;
}

// Genera nueva contraseña y la hashea
$nuevaPass = bin2hex(random_bytes(4)); // 8 caracteres aleatorios
$hashedPass = password_hash($nuevaPass, PASSWORD_DEFAULT);

// Actualiza en la base de datos
$updateQuery = "UPDATE usuarios SET contrasenaUsuario = '$hashedPass' WHERE correoUsuario = '$email'";
$conexion->query($updateQuery);

// Envía el correo
$asunto = "Recuperación de contraseña";
$mensaje = "Tu nueva contraseña temporal es: $nuevaPass";
$headers = "From: soporte@nvs.com\r\nContent-type: text/plain; charset=utf-8";

mail($email, $asunto, $mensaje, $headers);

echo json_encode(["success" => true, "message" => "Correo enviado exitosamente."]);
?>
