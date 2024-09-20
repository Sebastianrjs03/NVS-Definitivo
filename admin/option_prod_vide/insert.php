<?php

session_start();

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {

    $_SESSION['msg'] = "Registro guardado";

    $tipoProducto = $_POST['tipoproducto'];
    $iva = $_POST['iva'];
    $precio = $_POST['precio'];
    $nombre = $_POST['nombre'];
    $garantia = $_POST['garantia'];
    $admin = $_POST['admin'];
    $stock = $_POST['stock'];


    $consul = "INSERT INTO producto (nombreProducto, precioProducto, ivaProducto,
         garantiaProducto, stock, idTipoProducto, idAdministrador_crear)
         VALUES (:nombre, :precio, :iva, :garantia, :stock, :tipoProducto, :administrador)";

    $sql = $con->prepare($consul);

    $sql->execute([
        ':nombre' => $nombre,
        ':precio' => $precio,
        ':iva' => $iva,
        ':garantia' => $garantia,
        ':stock' => $stock,
        ':tipoProducto' => $tipoProducto,
        ':administrador' => $admin
    ]);

    $idProducto = $con->lastInsertId();

    $imagenes = ['visual1', 'visual2', 'visual3', 'banner', 'portada'];

    foreach ($imagenes as $imagen) {

        if (($_FILES[$imagen]['error']) == UPLOAD_ERR_OK) {


            $permitidos = array("image/jpg", "image/jpeg", "image/png", "image/webp", "image/jfif", "image/avif");

            if (in_array($_FILES[$imagen]['type'], $permitidos)) {

                if ($imagen == 'visual1' || $imagen == 'visual2' || $imagen == 'visual3') {

                    $dir = '../../imgs/juegos/visuales';

                    $nameAr = $imagen . "_";
                } elseif ($imagen == 'banner') {

                    $dir = '../../imgs/juegos/banner';

                    $nameAr = $imagen . "_";
                } elseif ($imagen == 'portada') {

                    $dir = '../../imgs/juegos/portada';

                    $nameAr = $imagen . "_";
                }

                $info_img = pathinfo($_FILES[$imagen]['name']);

                $extension = $info_img['extension'];

                $tmpPrincipal = $_FILES[$imagen]['tmp_name'];

                $principal = $dir . '/' . $nameAr . $idProducto . "." . $extension;

                if (!move_uploaded_file($tmpPrincipal, $principal)) {

                    $_SESSION['msg'] .= "<br>Error al guardar imagen";
                }
            } else {
                $_SESSION['msg'] .= "<br>Formato no permitido";
            }
        }
    }

    if (($_FILES['trailer']['error']) == UPLOAD_ERR_OK) {
        $permitidosVid = array("video/mp4", "video/avi", "video/mpeg", "video/quicktime", "video/webm", "video/x-ms-wmv", "video/x-flv");

        if (in_array($_FILES['trailer']['type'], $permitidosVid)) {

            $dir = '../../imgs/juegos/trailer';
            $nameAr = 'trailer_';

            $info_vid = pathinfo($_FILES['trailer']['name']);

            $extension = $info_vid['extension'];

            $tmpPrincipal = $_FILES['trailer']['tmp_name'];

            $principal = $dir . '/' . $nameAr . $idProducto . "." . $extension;

            if (!move_uploaded_file($tmpPrincipal, $principal)) {

                $_SESSION['msg'] .= "Error al guardar Video";
            }
        }else{
            $_SESSION['msg'] .= "Formato no permitido ";
        }
    }else{
        $_SESSION['msg'] .= "Error al cargar Video";
    }



    $marca = $_POST['marca'];

    foreach ($marca as $marca) {
        $consul = "INSERT INTO aux_marca (fk_pk_producto, fk_pk_marca) 
            VALUES (:producto, :marca)";

        $sql = $con->prepare($consul);

        $sql->execute([
            ':producto' => $idProducto,
            ':marca' => $marca
        ]);
    }

    $anoLanzamiento = $_POST['anoLanzamiento'];
    $lenguaje = $_POST['lenguaje'];
    $tipoJuego = $_POST['tipojuego'];
    $desarrollador = $_POST['desarrollador'];
    $sobreJuego = $_POST['sobreJuego'];


    $consul = "INSERT INTO juego (idJuego, anoLanzamineto, sobreJuego, idLenguaje, idTipoJuego, 
        idDesarrollador) VALUES (:id, :ano, :sobreJuego, :lenguaje, :tipo, :desarrollador)";

    $sql = $con->prepare($consul);

    $sql->execute([
        ':id' => $idProducto,
        ':ano' => $anoLanzamiento,
        ':sobreJuego' => $sobreJuego,
        ':lenguaje' => $lenguaje,
        ':tipo' => $tipoJuego,
        ':desarrollador' => $desarrollador
    ]);

    $plataforma = $_POST['plataforma'];

    foreach ($plataforma as $plataforma) {
        $consul = "INSERT INTO aux_plataforma (idJuego, idPlataforma) 
            VALUES (:producto, :plataforma)";

        $sql = $con->prepare($consul);

        $sql->execute([
            ':producto' => $idProducto,
            ':plataforma' => $plataforma
        ]);
    }

    $genero = $_POST['genero'];

    foreach ($genero as $genero) {
        $consul = "INSERT INTO aux_genero (fk_pk_juego, fk_pk_genero) 
            VALUES (:producto, :genero)";

        $sql = $con->prepare($consul);

        $sql->execute([
            ':producto' => $idProducto,
            ':genero' => $genero
        ]);
    }

    $conMinOs = $_POST['minOs'];
    $conMinProcesador = $_POST['minProcesador'];
    $conMinMemoria = $_POST['minMemoria'];
    $conMinAlmacenamiento = $_POST['minAlmacenamiento'];
    $conMinGrafica = $_POST['minGrafica'];

    $consul = "INSERT INTO configmin (fk_idJuego_min, os_min,
        procesador_min, memoria_min, almacenamiento_min, grafica_min)
        VALUES (:id, :os, :procesador, :memoria, :almacenamiento, :grafica)";

    $sql = $con->prepare($consul);

    $sql->execute([
        ':id' => $idProducto,
        ':os' => $conMinOs,
        ':procesador' => $conMinProcesador,
        ':memoria' => $conMinMemoria,
        ':almacenamiento' => $conMinAlmacenamiento,
        ':grafica' => $conMinGrafica
    ]);

    $conRecOs = $_POST['recOs'];
    $conRecProcesador = $_POST['recProcesador'];
    $conRecMemoria = $_POST['recMemoria'];
    $conRecAlmacenamiento = $_POST['recAlmacenamiento'];
    $conRecGrafica = $_POST['recGrafica'];

    $consul = "INSERT INTO configrecomendada (fk_idJuego_recom, os_recom,
        procesador_recom, memoria_recom, almacenamiento_recom, grafica_recom)
        VALUES (:id, :os, :procesador, :memoria, :almacenamiento, :grafica)";

    $sql = $con->prepare($consul);

    $sql->execute([
        ':id' => $idProducto,
        ':os' => $conRecOs,
        ':procesador' => $conRecProcesador,
        ':memoria' => $conRecMemoria,
        ':almacenamiento' => $conRecAlmacenamiento,
        ':grafica' => $conRecGrafica
    ]);
} else {
    $_SESSION['msg'] = "Error al guardar";
}


header('location: ../productos/anadir_productos.php');
