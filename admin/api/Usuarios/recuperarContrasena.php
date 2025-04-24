<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
require_once '../../../config/database.php'; // Asegúrate que este archivo esté en el mismo nivel

$db = new Database();
$conexion = $db->conectar();

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->email)) {
    echo json_encode(["success" => false, "message" => "Correo no enviado."]);
    exit;
}

$email = $data->email;

try {
    // Verificar si el correo existe
    $query = "SELECT * FROM usuario WHERE correoUsuario = :email";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        echo json_encode(["success" => false, "message" => "No existe cuenta con ese correo."]);
        exit;
    }

    // Generar nueva contraseña
    $nuevaPass = bin2hex(random_bytes(4)); // 8 caracteres aleatorios
    $hashedPass = password_hash($nuevaPass, PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $updateQuery = "UPDATE usuario SET contrasenaUsuario = :hashedPass WHERE correoUsuario = :email";
    $updateStmt = $conexion->prepare($updateQuery);
    $updateStmt->bindParam(':hashedPass', $hashedPass);
    $updateStmt->bindParam(':email', $email);
    $updateStmt->execute();

    // Enviar el correo
    $asunto = "Recuperación de contraseña";
    $mensaje = "Tu nueva contraseña temporal es: $nuevaPass\nPor favor cámbiala después de iniciar sesión.";
    $headers = "From: soporte@nvs.com\r\nContent-type: text/plain; charset=utf-8";

    mail($email, $asunto, $mensaje, $headers);

    echo json_encode(["success" => true, "message" => "Correo enviado exitosamente."]);

} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Error en el servidor: " . $e->getMessage()]);
}
?>
