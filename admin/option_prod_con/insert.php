<?php


session_start();

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


// Generar un token único al cargar el formulario
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {

    $_SESSION['msg'] = "Registro guardado";

    //Recoger informacion para producto//

    $tipoProducto = $_POST['tipoproducto'];
    $marca = $_POST['marca'];
    $iva = $_POST['iva'];
    $precio = $_POST['precio'];
    $nombre = $_POST['nombre'];
    $garantia = $_POST['garantia'];
    $admin = $_POST['admin'];


    //insertar datos en tabla productos//

    $consul = "INSERT INTO producto (nombreProducto, precioProducto, ivaProducto, 
garantiaProducto, idTipoProducto, idMarca, idAdministrador_crear)
 VALUES (:nombre, :precio, :iva, :garantia, :tipoProducto, :marca, :administrador)";

    $sql = $con->prepare($consul);

    $sql->execute([
        ':nombre' => $nombre,
        ':precio' => $precio,
        ':iva' => $iva,
        ':garantia' => $garantia,
        ':tipoProducto' => $tipoProducto,
        ':marca' => $marca,
        ':administrador' => $admin
    ]);

    //Recoger id para demás tablas//

    $idProducto = $con->lastInsertId();

    //Recoger informacion para imagenes (nombre de los inputs (anadir-produconsolas))//

    $images = ['principal', 'auxiliar1', 'auxiliar2', 'auxiliar3'];

    // Recorrer los inputs

    foreach ($images as $image) {

        //if para verificar si hay un error//
        if (($_FILES[$image]['error']) == UPLOAD_ERR_OK) {

            //Variable que almacena en forma de array los formatos permitidos//

            $permitidos = array("image/jpg", "image/jpeg", "image/png", "image/webp", "image/jfif", "image/avif");

            //if para verificar si el archivo recibido cuenta con en la extension permitida//

            if (in_array($_FILES[$image]['type'], $permitidos)) {

                //if para verificar si la imagen viene de los inputs auxiliares//

                if ($image == 'auxiliar1' || $image == 'auxiliar2' || $image == 'auxiliar3') {

                    //Se almacena la imagen en la ruta dir//

                    $dir = "../../imgs/consolas/auxiliar";

                    //Se nombra el archivo dependiendo de que auxiliar sea//

                    $nameAr = $image . "_";

                    //de no ser asi la imagen viene del input principal//

                } else {

                    //se almacena en una ruta diferente//

                    $dir = "../../imgs/consolas/principal";

                    //el nombre de imagen pasa a ser llamado principal//

                    $nameAr = "principal_";
                }

                //Variable que almacena la informacion de la imagen//

                $info_img = pathinfo($_FILES[$image]['name']);

                //Variable que almacena la extencion de la imagen de la variable anterior (se muestra en forma de array)//

                $extension = $info_img['extension'];

                //Variable que almacena el nombre temporal de la imagen//

                $tmpPrincipal = $_FILES[$image]['tmp_name'];


                //Variable que almacena: rutaCarpeta/nombreImagen/idImagen/suExtension //

                $principal = $dir . '/' . $nameAr . $idProducto. "." . $extension;

                //se guarda la imagen y cambia su nombre temporal por el principal//
                //(!) invierte la condicion (si no se movio el archivo muestra error)//

                if (!move_uploaded_file($tmpPrincipal, $principal)) {

                    $_SESSION['msg'] .= "<br>Error al guardar imagen";
                }
            } else {
                $_SESSION['msg'] .= "<br>Formato de imagen no permitido imagen: ".$image;
            }
        }
    }


    //Recoger informacion para consola//

    $sobrePro = $_POST['sobrepro'];
    $carac = $_POST['carac'];

    $consul = "INSERT INTO consola (idConsola, sobreConsola, caracteristicasConsola)
VALUES (:idConsola, :sobreConsola, :caracteristicasConsola)";

    $sql = $con->prepare($consul);

    $sql->execute([
        'idConsola' => $idProducto,
        ':sobreConsola' => $sobrePro,
        ':caracteristicasConsola' => $carac
    ]);

    //Recoger informacion conectividad//

    $alimentacion = $_POST['alimentacion'];
    $conectividad = $_POST['conectividad'];
    $puertos = $_POST['puertos'];

    $consul = "INSERT INTO conectividad (idConsola, fuenteAlimentacion, opcionConectividad, tipoPuertos) 
VALUES (:idConsola, :fuenteAli, :opcionConect, :tipoPuer)";

    $sql = $con->prepare($consul);

    $sql->execute([
        ':idConsola' => $idProducto,
        'fuenteAli' => $alimentacion,
        'opcionConect' => $conectividad,
        'tipoPuer' => $puertos
    ]);

    //Recoger informacion dimensiones//

    $ancho = $_POST['ancho'];
    $alto = $_POST['alto'];
    $fondo = $_POST['fondo'];

    $consul = ("INSERT INTO dimensiones (idConsola, ancho, alto, fondo) 
VALUES (:idConsola, :ancho, :alto, :fondo)");

    $sql = $con->prepare($consul);

    $sql->execute([
        ':idConsola' => $idProducto,
        ':ancho' => $ancho,
        ':alto' => $alto,
        ':fondo' => $fondo
    ]);

    //Recoger informacion caracteristicas fisicas//

    $tonalidad = $_POST['tonalidad'];
    $tipoControles = $_POST['tipocontroles'];
    $controlesIncluidos = $_POST['controlesincluidos'];
    $controlesSoporta = $_POST['controlessoporta'];

    $consul = ("INSERT INTO caracteristicasfis (idConsola, color,
tipoControles, controlesIncluidos, controlesSoporta) VALUES 
(:idConsola, :color, :tipoControles, :controlesIncluidos,
:controlesSoporta)");

    $sql = $con->prepare($consul);

    $sql->execute([
        ':idConsola' => $idProducto,
        ':color' => $tonalidad,
        ':tipoControles' => $tipoControles,
        ':controlesIncluidos' => $controlesIncluidos,
        ':controlesSoporta' => $controlesSoporta
    ]);


    //Recoger informacion caracteristicas tecnicas//

    $tipoProcesador = $_POST['tipoprocesador'];
    $resolucionImagen = $_POST['resolucionimagen'];
    $plataforma = $_POST['plataforma'];


    $consul = ("INSERT INTO caracteristicastec (idConsola, tipoProcesador,
resolucion, plataforma) VALUES (:idConsola, :tipoProcesador,
:resolucion, :plataforma)");

    $sql = $con->prepare($consul);

    $sql->execute([
        ':idConsola' => $idProducto,
        ':tipoProcesador' => $tipoProcesador,
        ':resolucion' => $resolucionImagen,
        ':plataforma' => $plataforma
    ]);
} else {
    $_SESSION['msg'] = "Error al guardar datos";
}

header('location: ../productos/anadir-produconsolas.php');
