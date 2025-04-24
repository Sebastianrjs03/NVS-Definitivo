<?php
// Verifica si el correo existe
$sql = "SELECT * FROM usuario WHERE correoUsuario = :email";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->rowCount() === 0) {
    echo json_encode(["success" => false, "message" => "No existe cuenta con ese correo."]);
    exit;
}

// Generar nueva contraseña
$nuevaPass = bin2hex(random_bytes(4)); // genera 8 caracteres aleatorios
$hashedPass = password_hash($nuevaPass, PASSWORD_DEFAULT);

// Actualizar contraseña en la base de datos
$update = "UPDATE usuario SET contrasenaUsuario = :pass WHERE correoUsuario = :email";
$stmt = $conexion->prepare($update);
$stmt->bindParam(':pass', $hashedPass);
$stmt->bindParam(':email', $email);
$stmt->execute();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // o tu proveedor SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'darivera9831@gmail.com'; // tu correo
    $mail->Password   = 'wjld ertr lhpe vwyn'; // contraseña del correo o App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Configuración del mensaje
    $mail->setFrom('darivera9831@gmail.com', 'Soporte NVS');
    $mail->addAddress($email);
    $mail->Subject = 'Recuperación de contraseña';
    $mail->Body    = "Tu nueva contraseña temporal es: $nuevaPass\nPor favor cámbiala después de iniciar sesión.";

    // Enviar correo
    $mail->send();

    echo json_encode(["success" => true, "message" => "Correo enviado exitosamente."]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "No se pudo enviar el correo. Error: {$mail->ErrorInfo}"]);
}
