<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$idCliente = $_POST['idCliente'];
$direccion = $_POST['direccion'];
$complemento = $_POST['complemento'];

$consul = ("INSERT INTO direccion (fk_pk_Cliente, direccion,complemento)
            VALUES (:cliente, :dir, :com)");

try {
    $sql = $con->prepare($consul);


    $sql->execute([
        ":cliente"=> $idCliente,
        ':dir' => $direccion,
        ':com' => $complemento
    ]);

    header('Location: ../direccion/mod_direccion.php');
    exit; 

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>