<?php
require '../../config/database.php';
$db = new Database();
$con = $db->conectar();

    $id = $_POST['id'];
    $sql = $con->prepare("SELECT * FROM desarrollador WHERE idDesarrollador = :id LIMIT 1");
    $sql->execute([':id' => $id]);

    $rows = $sql->rowCount();

    if($rows > 0){
       $resultado = $sql->fetch(PDO::FETCH_ASSOC);
    }
    
    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
    
?>
