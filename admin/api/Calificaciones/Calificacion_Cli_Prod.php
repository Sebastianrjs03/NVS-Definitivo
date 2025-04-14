<?php

require '../../../config/database.php';


$db = new Database();
$con = $db->conectar();


header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];

$inputData = json_decode(file_get_contents("php://input"), true);


switch ($method) {
    case "GET":

        $sql = $con->prepare("SELECT * FROM calificacion");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

        http_response_code(200);
        echo json_encode($resultado);
        break;

    case "POST":

        if (!empty($inputData)) {

            $idCliente = $inputData['idCliente'];
            $id = $inputData['idProducto'];
            $numeroCalificacion = $inputData['calificacion'];
            $comentario = $inputData['comentario'];

            $consul = ("INSERT INTO calificacion (idCliente, idProducto, numeroCalificacion,comentarioCalificacion)
            VALUES (:cliente, :id, :numero, :comentario)");

            $consulE = ("SELECT * FROM calificacion WHERE idProducto = :id && idCliente = :id2 LIMIT 1");
            $sql = $con->prepare($consulE);
            $sql->execute([
                ':id' => $id,
                ':id2' => $idCliente
            ]);

            $rows = $sql->rowCount();

            if ($rows > 0) {
                http_response_code(201);
                echo json_encode(["success" => false, "message" => "Ya existe la calificación para este producto por este cliente."]);
                break;
            } else {
                try {
                    $sql = $con->prepare($consul);

                    $sql->execute([
                        ":cliente" => $idCliente,
                        ':id' => $id,
                        ':numero' => $numeroCalificacion,
                        ':comentario' => $comentario
                    ]);

                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }

                http_response_code(201);
            }

        } else {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "Datos inválidos"]);
        }
        break;

    case "PUT":
        if (!empty($inputData)) {
            $idCliente = $inputData['idCliente'];
            $id = $inputData['idProducto'];
            $numeroCalificacion = $inputData['calificacion'];
            $comentario = $inputData['comentario'];

            $consul = ("UPDATE calificacion SET 
                        numeroCalificacion = :NCalificacion,
                        comentarioCalificacion = :comentario 
                        WHERE idProducto = :id AND idCliente = :idCliente");

            $consulE = ("SELECT * FROM calificacion WHERE idProducto = :id && idCliente = :id2 LIMIT 1");
            $sql = $con->prepare($consulE);
            $sql->execute([
                ':id' => $id,
                ':id2' => $idCliente
            ]);

            $rows = $sql->rowCount();

            if ($rows == 0) {
                http_response_code(201);
                echo json_encode(["success" => false, "message" => "No existe ninguna calificacion Con los Ids Seleccionados"]);
                break;
            } else{
            $sql = $con->prepare($consul);
            $sql->execute([
                ':NCalificacion' => $numeroCalificacion,
                ':comentario' => $comentario,
                ':id' => $id,
                ':idCliente' => $idCliente
            ]);
            http_response_code(200);}
        } else {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "Datos inválidos"]);
        }
        break;

    case "DELETE":

        $id = $inputData['idProducto'];
        $id2 = $inputData['idCliente'];

        $consul = "DELETE FROM calificacion WHERE idProducto = :id AND idCliente = :id2";

        $sql = $con->prepare($consul);
        $sql->execute([
            ':id' => $id,
            ':id2' => $id2
        ]);
        http_response_code(200);
        break;

    default:
        // Método no permitido
        http_response_code(405);
        echo json_encode(["success" => false, "message" => "Método no permitido"]);
        break;
}

?>