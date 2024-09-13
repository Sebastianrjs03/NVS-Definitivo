<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$idCliente = $_POST['idCliente'];
$id = $_POST['idProducto'];
$numeroCalificacion = $_POST['numeroCalificacion'];
$comentario = $_POST['comentario'];

$consul = ("INSERT INTO calificacion (idCliente, idProducto, numeroCalificacion,comentarioCalificacion)
            VALUES (:cliente, :id, :numero, :comentario)");

try {
    $sql = $con->prepare($consul);


    $sql->execute([
        ":cliente"=> $idCliente,
        ':id' => $id,
        ':numero' => $numeroCalificacion,
        ':comentario' => $comentario
    ]);

    header('Location: ../calificaciones_cliente_producto/calificacion_producto-Cliente.php');
    exit; 

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>