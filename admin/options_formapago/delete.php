<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

    $idFormaPago = $_POST['id'];    

    $consul = "DELETE FROM formapago WHERE idFormaPago = :id";

    $sql = $con->prepare($consul);
    $sql->execute([':id' => $idFormaPago]);

    header('Location: ../formaPago/indexformapago.php');


?>

