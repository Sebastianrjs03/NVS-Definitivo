<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$id = $_POST['id'];

$consul = ("SELECT * FROM formapago WHERE idFormaPago= :id LIMIT 1");
$sql = $con->prepare($consul);
$sql->execute([':id' => $id]);

$rows = $sql->rowCount();

if($rows > 0){
   $resultado_formapago = $sql_formapago->fetch(PDO::FETCH_ASSOC);
}

echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
?>