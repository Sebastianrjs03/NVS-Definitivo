<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$id = $_POST['id'];
$TCalificacion = $_POST['totalCalificacion'];
$PromAceptacion = $_POST['PromedioAceptacion'];

$consul = ("INSERT INTO calificacionfinal (idProducto, totalCalificacion, PromedioAceptacion)
            VALUES (:id, :TC, :PA)");

try {
    $sql = $con->prepare($consul);


    $sql->execute([
        ':id' => $id,
        ':TC' => $TCalificacion,
        ':PA' => $PromAceptacion
    ]);

    header('Location: ../calificacion_producto-Final.php');
    exit; 

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>