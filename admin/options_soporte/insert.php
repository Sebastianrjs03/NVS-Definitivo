<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$idCliente = $_POST['idCliente'];
$nombre = $_POST['nombreUsuario'];
$apellido = $_POST['apellidoUsuario'];
$fecha = $_POST['fecha'];
$pqrs = $_POST['pqrs'];

$consul = ("INSERT INTO soporte (idCliente, nombreUsuario, apellidoUsuario, fecha, pqrs)
            VALUES (:cliente, :nombre, :apellido, :fecha, :pqrs)");

try {
    $sql = $con->prepare($consul);


    $sql->execute([
        ":cliente"=> $idCliente,
        ':nombre' => $nombre,
        ':apellido' => $apellido,
        ':fecha' => $fecha,
        ':pqrs' => $pqrs
    ]);

    header('Location: ../soporte/mod_soporte.php');
    exit; 

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>