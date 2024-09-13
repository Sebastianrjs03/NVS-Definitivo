<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$id = $_POST['idPuntosCliente'];
$totalPuntos = $_POST['puntosTotales'];

$consul = ("INSERT INTO puntoscliente (idPuntosCliente, totalPuntos)   VALUES (:id, :puntos)");

try {
    $sql = $con->prepare($consul);


    $sql->execute([
        ':id' => $id,
        ':puntos' => $totalPuntos
    ]);

    header('Location: ../puntos_cliente/mod_puntoscli.php');
    exit; 

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>