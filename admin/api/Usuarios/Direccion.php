
<?php

require '../../../config/database.php';


$db = new Database();
$con = $db->conectar();


header("Access-Control-Allow-Origin: http://localhost:5173"); 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type"); 
header("Content-Type: application/json"); 

$method = $_SERVER['REQUEST_METHOD'];

$inputData = json_decode(file_get_contents("php://input"), true);


switch ($method) {
    case "GET":

        $sql = $con->prepare("SELECT * FROM cliente");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

        http_response_code(200);
        echo json_encode($resultado);
        break;

    case "POST":

        if (!empty($inputData)) {

            $idCliente = $inputData['idCliente'];
            $direccion = $inputData['direccion'];
            $complemento = $inputData['complemento'];

            $consul = ("INSERT INTO cliente (idCliente, direccion, complemento)
            VALUES ( :idCliente, :direccion, :complemento)");

            try {
                $sql = $con->prepare($consul);


                $sql->execute([
                    ":idCliente" => $idCliente,
                    ':direccion' => $direccion,
                    ':complemento' => $complemento
                ]);

            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }

            http_response_code(201);
        } else {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "Datos inválidos"]);
        }
        break;

    case "PUT":

        if (!empty($inputData)) {

            $idCliente = $inputData['idCliente'];
            $direccion = $inputData['direccion'];
            $complemento = $inputData['complemento'];

            $consul = ("UPDATE cliente SET 
                        direccion = :direccion,
                        complemento = :complemento 
                        WHERE idCliente ");

            $sql = $con->prepare($consul);
            $sql->execute([
                ":idCliente" => $idCliente,
                ':direccion' => $direccion,
                ':complemento' => $complemento
            ]);
            http_response_code(200);
        } else {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "Datos inválidos"]);
        }
        break;

    case "DELETE":

        $id = $inputData['id'];
        $id2 = $inputData['idCliente'];

        $consul = "DELETE FROM calificacion WHERE idProducto = :id AND idCliente = :
        id2";
    
        $sql = $con->prepare($consul);
        $sql->execute([':id' => $id,
        ':id2' => $id2]);
        http_response_code(200);
        break;

    default:
        // Método no permitido
        http_response_code(405);
        echo json_encode(["success" => false, "message" => "Método no permitido"]);
        break;
}

?>