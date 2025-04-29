<?php

require '../../../config/database.php';


$db = new Database();
$con = $db->conectar();

$id = $_POST['id'];
$idCliente = $_POST['idCliente'];


$consul = ("SELECT * FROM calificacion WHERE idProducto = :id AND idCliente = :idCliente LIMIT 1");
$sql = $con->prepare($consul);
$sql->execute([':id' => $id, ':idCliente' => $idCliente]);

$rows = $sql->rowCount();

$response = [
    'existe' => $rows > 0 
];

header('Content-Type: application/json');

echo json_encode($response)

?>