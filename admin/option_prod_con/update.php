<?php

session_start();

require_once '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];


$sql = $con->prepare("SELECT ad.idAdministrador, us.nombreUsuario 
FROM administrador AS ad
LEFT JOIN usuario as us
ON ad.idAdministrador = us.idUsuario");
$sql->execute();

$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql2 = $con->prepare("SELECT * FROM marca WHERE estado_marca = 1");
$sql2->execute();
$resultado2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

$sql3 = $con->prepare("SELECT * FROM plataforma WHERE estadoPlataforma = 1");
$sql3->execute();
$resultado3 = $sql3->fetchAll(PDO::FETCH_ASSOC);

$sql4 = $con->prepare("SELECT * 
FROM producto as pro
INNER JOIN consola as co on pro.idProducto = co.idConsola 
INNER JOIN aux_marca as ma on pro.idProducto = ma.fk_pk_producto 
INNER JOIN caracteristicasconsola as cf on pro.idProducto = cf.idConsola  
INNER JOIN usuario as us on pro.idAdministrador_crear = us.idUsuario  
WHERE idProducto = $id");
$sql4->execute();
$resultado4 = $sql4->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../../css/admin/admin-product-consolas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container2">
        <div class="sidebar">
            <aside>
                <div class="profile">
                    <img src="../img-admin/setting.png" alt="">
                    <h2 class="texto1">Admin: Roberto Toto</h2>
                    <p class="texto1">Admin 01</p>
                    <p class="texto2">Se unió: Julio 24 de 2024</p>
                </div>
                <div class="contmenu-logo">
                    <nav class="menu">
                        <ul class="ul-menu">
                            <li>
                                <label for="usuarios">
                                    <i class="fas fa-users" style="font-size: 30px;"></i> Usuarios
                                </label>
                                <input type="checkbox" id="usuarios">
                                <ul>
                                    <a href="../indexadmin.php" style="font-size: 12px;">
                                        <li>Modificar Usuarios</li>
                                    </a>
                                    <a href="../usuarios/admin.php" style="font-size: 12px;">
                                        <li>Modificar Cliente</li>
                                    </a>
                                    <a href="../usuarios/admin.php" style="font-size: 12px;">
                                        <li>Modificar Administrador</li>
                                    </a>
                                </ul>
                            </li>

                            <li>
                                <label for="productos">
                                    <i class="fas fa-box" style="font-size: 30px;"></i> Productos
                                </label>
                                <input type="checkbox" id="productos">
                                <ul>
                                    <a href="../productos/anadir_productos.php"
                                        style="font-size: 12px; margin-bottom: 1px;">
                                        <li>Añadir Producto</li>
                                    </a>
                                    <a href="../productos/mod_producto_con.php"
                                        style="font-size: 12px; margin-bottom: 1px;">
                                        <li>Modificar Consolas</li>
                                    </a>
                                    <a href="../productos/anadir_productos.php"
                                        style="font-size: 12px; margin-bottom: 1px;">
                                        <li>Modificar Videojuegos</li>
                                    </a>
                                    <a href="../productos/mod_desarrollador.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Modificar Desarrollador</li>
                                    </a>
                                    <a href="../productos/mod_marca.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Modificar Marca</li>
                                    </a>
                                    <a href="../productos/mod_lenguaje.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Modificar Lenguaje</li>
                                    </a>
                                    <a href="../productos/mod_genero.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Modificar Genero</li>
                                    </a>
                                </ul>
                            </li>

                            <li>
                                <label for="factura">
                                    <i class="fa-solid fa-money-bill-1-wave " style="font-size: 30px;"></i> Facturas
                                </label>
                                <input type="checkbox" id="factura">
                                <ul>
                                    <a href="../factura/factura.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Facturas</li>
                                    </a>
                                    <a href="../formapago/indexformapago.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Forma Pago</li>
                                    </a>
                                </ul>
                            </li>

                            <li>
                                <label for="puntos">
                                    <i class="fas fa-star" style="font-size: 30px;"></i> Puntos
                                </label>
                                <input type="checkbox" id="puntos">
                                <ul>
                                    <a href="../puntos_cliente/historial-puntos.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Historial de Puntos</li>
                                    </a>
                                    <a href="../puntos_cliente/mod_puntoscli.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Puntos Clientes</li>
                                    </a>
                                </ul>
                            </li>

                            <li>
                                <label for="calificacion">
                                    <i class="fa-solid fa-comment-dots" style="font-size: 30px;"></i> Calificacion
                                </label>
                                <input type="checkbox" id="calificacion">
                                <ul>
                                    <a href="../calificaciones_cliente_producto/calificacion_producto-Cliente.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Calificacion Producto-Cliente
                                        </li>
                                    </a>
                                    <a href="../calificaciones_cliente_producto/calificacion_producto-Final.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Calificacion Producto-Final
                                        </li>
                                    </a>
                                </ul>
                            </li>

                            <li>
                                <label for="envios">
                                    <i class="fa-solid fa-paper-plane" style="font-size: 30px;"></i> Envios
                                </label>
                                <input type="checkbox" id="envios">
                                <ul>
                                    <a href="../envios/mod_envio.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Envios</li>
                                    </a>
                                    <a href="../envios/mod_estadoenvio.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Estado de envio</li>
                                    </a>

                                </ul>
                            </li>

                            <li>
                                <label for="soporte">
                                    <i class="fas fa-cogs" style="font-size: 30px;"></i> Soporte
                                </label>
                                <input type="checkbox" id="soporte">
                                <ul>
                                    <li style="font-size: 12px; margin-bottom: 1px;">PQRS</li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <img src="img-admin/logoNVS.svg" alt="" class="logo">
                </div>
            </aside>
        </div>
        <div class="main-content">
            <hr>
            <?php if (isset($_SESSION['msg'])) { ?>
                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <?= $_SESSION['msg']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['msg']);
            }
            ?>
            <h2>Añadir Producto</h2>

            <form action="update_con.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="product-form">
                    <div class="visuals">
                        <div class="image-placeholder-left">
                            <div class="img-left">

                                <input type="hidden" name="id" id="id" value=<?= $id ?>>
                                <?php $permitidos = ["jpg", "jpeg", "png", "webp", "jfif", "avif"]; ?>

                                <?php foreach ($permitidos as $permitido) {
                                    if (file_exists("../../imgs/consolas/auxiliar/auxiliar1_" . $id . "." . $permitido)) {
                                        $dir1 = "../../imgs/consolas/auxiliar/auxiliar1_" . $id . "." . $permitido;
                                    } elseif (!isset($dir1)) {
                                        $dir1 = "";
                                    }
                                } ?>

                                <?php foreach ($permitidos as $permitido) {
                                    if (file_exists("../../imgs/consolas/auxiliar/auxiliar2_" . $id . "." . $permitido)) {
                                        $dir2 = "../../imgs/consolas/auxiliar/auxiliar2_" . $id . "." . $permitido;
                                    } elseif (!isset($dir2)) {
                                        $dir2 = "";
                                    }
                                } ?>

                                <?php foreach ($permitidos as $permitido) {
                                    if (file_exists("../../imgs/consolas/auxiliar/auxiliar3_" . $id . "." . $permitido)) {
                                        $dir3 = "../../imgs/consolas/auxiliar/auxiliar3_" . $id . "." . $permitido;
                                    } elseif (!isset($dir3)) {
                                        $dir3 = "";
                                    }
                                } ?>

                                <?php foreach ($permitidos as $permitido) {
                                    if (file_exists("../../imgs/consolas/principal/principal_" . $id . "." . $permitido)) {
                                        $dir4 = "../../imgs/consolas/principal/principal_" . $id . "." . $permitido;
                                    } elseif (!isset($dir4)) {
                                        $dir4 = "";
                                    }
                                }
                                ?>


                                <input type="hidden" name="auxiliar1" id="auxiliar1" value=<?= $dir1 ?>>
                                <input type="hidden" name="auxiliar2" id="auxiliar2" value=<?= $dir2 ?>>
                                <input type="hidden" name="auxiliar3" id="auxiliar3" value=<?= $dir3 ?>>
                                <input type="hidden" name="principal" id="principal" value=<?= $dir4 ?>>

                                <img style="position: absolute;" src="<?= $dir1 ?>" alt="" width="100%">
                                <input class="file-input2 input2" type="file" id="auxiliar1" name="auxiliar1"
                                    style="width: 130px;">
                            </div>
                            <div class="img-left">
                                <img style="position: absolute;" src="<?= $dir2 ?>" alt="" width="100%">
                                <input class="file-input2 input2" type="file" id="auxiliar2" name="auxiliar2"
                                    style="width: 130px;">
                            </div>
                            <div class="img-left">
                                <img style="position: absolute;" src="<?= $dir3 ?>" alt="" width="100%">
                                <input class="file-input2 input2" type="file" id="auxiliar3" name="auxiliar3"
                                    style="width: 130px;">
                            </div>
                        </div>
                        <div class="image-placeholder">
                            <label for="name">Principal</label>
                            <img style="position: absolute;" src="<?= $dir4 ?>" alt="" width="100%">
                            <input class="file-input2 input2" type="file" id="principal" name="principal"
                                style="width: 130px;">
                        </div>
                    </div>

                    <div class="product-details">
                        <label for="product-type">Tipo de producto:</label>
                        <select id="product-type" name="tipoproducto" required>
                            <option value="Consola">Consola</option>
                        </select>

                        <label for="developer">Marca:</label>
                        <select id="developer" name="marca" required>
                            <option value="<?= $resultado4['fk_pk_marca'] ?>">(<?= $resultado4['fk_pk_marca'] ?>)</option>
                            <?php foreach ($resultado2 as $row) { ?>
                                <option value="<?= $row['marca'] ?>"><?= $row['fk_pk_marca'] ?></option>
                            <?php } ?>
                        </select>



                        <label for="price">IVA:</label>
                        <input value="<?= $resultado4['ivaProducto'] ?>" type="text" id="iva" name="iva" required>

                        <label for="price">Valor:</label>
                        <input value="<?= $resultado4['precioProducto'] ?>" type="text" id="precio" name="precio"
                            required>


                        <label for="name">Nombre Consola:</label>
                        <input value="<?= $resultado4['nombreProducto'] ?>" type="text" id="nombre" name="nombre"
                            required>
                    </div>
                    <div class="product-details">
                        <label for="name">Garantia Consola</label>
                        <input value="<?= $resultado4['garantiaProducto'] ?>" type="text" id="garantia" name="garantia"
                            required>
                        <label for="developer">Administardor Encargado:</label>
                        <select id="developer" name="admin">
                            <option value="<?= $resultado4['idAdministrador_crear']; ?>">
                                (<?= $resultado4['idAdministrador_crear']; ?> <?= $resultado4['nombreUsuario']; ?>)
                            </option>
                            <?php foreach ($resultado as $row) { ?>
                                <option value="<?= $row['idAdministrador']; ?>"><?= $row['idAdministrador']; ?>
                                    <?= $row['nombreUsuario']; ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <h3>Acerca de:</h3>
                <div class="about-section">
                    <div class="container-description">
                        <h5>Sobre el producto:</h5>
                        <textarea name="sobrepro" id="sobrepro" required><?= $resultado4['sobreConsola']; ?></textarea>
                    </div>
                </div>


                <h3>Especificaciones tecnicas:</h3>
                <div class="form-container">
                    <div class="section">
                        <h3>Conectividad</h3>
                        <div class="row">
                            <div class="cell">
                                <label for="ancho">Fuentes de alimentacion</label>
                                <input value="<?= $resultado4['fuenteAlimentacion']; ?>" type="text" id="alimentacion"
                                    name="alimentacion" required>
                            </div>
                            <div class="cell">
                                <label for="alto">Opciones de conectividad</label>
                                <input value="<?= $resultado4['opcionConectividad']; ?>" type="text" id="conectividad"
                                    name="conectividad" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="cell">
                                <label for="fondo">Tipos de puertos</label>
                                <input value="<?= $resultado4['tipoPuertos']; ?>" type="text" id="puertos"
                                    name="puertos" required>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <h3>Características Físicas</h3>
                        <div class="row">
                            <div class="cell">
                                <label for="tonalidad">Tonalidad de Color</label>
                                <input value="<?= $resultado4['color']; ?>" type="text" id="tonalidad" name="tonalidad"
                                    required>
                            </div>
                            <div class="cell">
                                <label for="tipo-controles">Tipo de Controles</label>
                                <input value="<?= $resultado4['tipoControles']; ?>" type="text" id="tipo-controles"
                                    name="tipocontroles" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="cell">
                                <label for="controles-incluidos">Controles Incluidos</label>
                                <input value="<?= $resultado4['controlesIncluidos']; ?>" type="text"
                                    id="controles-incluidos" name="controlesincluidos" required>
                            </div>
                            <div class="cell">
                                <label for="controles-soporta">Controles que Soporta</label>
                                <input value="<?= $resultado4['controlesSoporta']; ?>" type="text"
                                    id="controles-soporta" name="controlessoporta" required>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <h3>Características Técnicas</h3>
                        <div class="row">
                            <div class="cell">
                                <label for="tipo-procesador">Tipo de Procesador</label>
                                <input value="<?= $resultado4['tipoProcesador']; ?>" type="text" id="tipo-procesador"
                                    name="tipoprocesador" required>
                            </div>
                            <div class="cell">
                                <label for="resolucion-imagen">Resolución Imagen</label>
                                <input value="<?= $resultado4['resolucion']; ?>" type="text" id="resolucion-imagen"
                                    name="resolucionimagen" required>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="button">Añadir Producto</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>