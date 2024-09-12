<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$envio = $_POST['envio'];
$tiempoestimado = $_POST['tiempoestimado'];
$observaciones = $_POST['observaciones'];
$estadoenvio = $_POST['estadoenvio'];


$consul = ("INSERT INTO envios (fk_pk_Factura,
tiempoEstimado, observaciones, idEstadoEnvio)   VALUES (:envio, :tiempoestimado, 
:observaciones, :estadoenvio)");

$sql = $con->prepare($consul);  

$sql->execute([':envio' => $envio,
':tiempoestimado' => $tiempoestimado, ':observaciones' => $observaciones, ':estadoenvio' => $estadoenvio]);

header ('location: ../envios/mod_envio.php')  





?>