<?php

session_start();

require_once '../config/database.php';

$db = new Database();
$con = $db->conectar();

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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../css/admin/admin-product-consolas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container2">
        <div class="sidebar">
            <aside>
                <div class="profile">
                    <img src="img-admin/setting.png" alt="">
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
                                    <a href="indexadmin.php" style="font-size: 12px;">
                                        <li>Modificar Usuarios</li>
                                    </a>
                                    <a href="indexadmin.php" style="font-size: 12px;">
                                        <li>Modificar Cliente</li>
                                    </a>
                                    <a href="admin.php" style="font-size: 12px;">
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
                                    <a href="anadir_productos.php" style="font-size: 12px; margin-bottom: 1px;">
                                        <li>Añadir Productos</li>
                                    </a>
                                    <a href="mod_producto_con.php" style="font-size: 12px; margin-bottom: 1px;">
                                        <li>Modificar Consolas</li>
                                    </a>
                                    <a href="anadir_productos.php" style="font-size: 12px; margin-bottom: 1px;">
                                        <li>Modificar Videojuegos</li>
                                    </a>
                                </ul>
                            </li>

                            <li>
                                <label for="puntos">
                                    <i class="fas fa-star" style="font-size: 30px;"></i> Puntos
                                </label>
                                <input type="checkbox" id="puntos">
                                <ul>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="historial-puntos.html">Historial de Puntos</a></li>
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

            <form action="option_prod_con/insert.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="product-form">
                    <div class="visuals">
                        <div class="image-placeholder-left">
                            <div class="img-left">
                                <label for="name">Auxiliar:</label>
                                <input class="file-input" type="file" id="auxiliar1" name="auxiliar1" style="width: 130px;">
                            </div>
                            <div class="img-left">
                                <label for="name">Auxiliar:</label>
                                <input class="file-input" type="file" id="auxiliar2" name="auxiliar2" style="width: 130px;">
                            </div>
                            <div class="img-left">
                                <label for="name">Auxiliar:</label>
                                <input class="file-input" type="file" id="auxiliar3" name="auxiliar3" style="width: 130px;">
                            </div>
                        </div>
                        <div class="image-placeholder">
                            <label for="name">Principal</label>
                            <input class="file-input" type="file" id="principal" name="principal" style="width: 130px;">
                        </div>
                    </div>
                    <div class="product-details">
                        <label for="product-type">Tipo de producto:</label>
                        <select id="product-type" onchange="redirigir()" name="tipoproducto" required>
                            <option value="Consola">Consola</option>
                            <option value="Videojuego">Videojuego</option>
                        </select>

                        <label for="developer">Marca:</label>
                        <select id="developer" name="marca" required>
                            <?php foreach ($resultado2 as $row) { ?>
                                <option value="<?= $row['idMarca'] ?>"><?= $row['idMarca'] ?></option>
                            <?php } ?>
                        </select>

                        <label for="price">IVA:</label>
                        <input type="text" id="iva" name="iva" required>

                        <label for="price">Valor:</label>
                        <input type="text" id="precio" name="precio" required>


                        <label for="name">Nombre Consola:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="product-details">
                        <label for="name">Garantia Consola</label>
                        <input type="text" id="garantia" name="garantia" required>
                        <label for="developer">Administardor Encargado:</label>
                        <select id="developer" name="admin">
                            <?php foreach ($resultado as $row) { ?>
                                <option value="<?= $row['idAdministrador']; ?>"><?= $row['idAdministrador']; ?> <?= $row['nombreUsuario']; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <h3>Acerca de:</h3>
                <div class="about-section">
                    <div class="container-description">
                        <h5>Sobre el producto:</h5>
                        <textarea name="sobrepro" id="sobrepro" required></textarea>
                    </div>

                    <div class="container-description">
                        <h5>Cracteristicas especiales:</h5>
                        <textarea name="carac" id="carac" required></textarea>
                    </div>
                </div>


                <h3>Especificaciones tecnicas:</h3>
                <div class="form-container">
                    <div class="section">
                        <h3>Conectividad</h3>
                        <div class="row">
                            <div class="cell">
                                <label for="ancho">Fuentes de alimentacion</label>
                                <input type="text" id="alimentacion" name="alimentacion" required>
                            </div>
                            <div class="cell">
                                <label for="alto">Opciones de conectividad</label>
                                <input type="text" id="conectividad" name="conectividad" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="cell">
                                <label for="fondo">Tipos de puertos</label>
                                <input type="text" id="puertos" name="puertos" required>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <h3>Dimensiones</h3>
                        <div class="row">
                            <div class="cell">
                                <label for="ancho">Ancho o Frente</label>
                                <input type="text" id="ancho" name="ancho" required>
                            </div>
                            <div class="cell">
                                <label for="alto">Alto</label>
                                <input type="text" id="alto" name="alto" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="cell">
                                <label for="fondo">Fondo</label>
                                <input type="text" id="fondo" name="fondo" required>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <h3>Características Físicas</h3>
                        <div class="row">
                            <div class="cell">
                                <label for="tonalidad">Tonalidad de Color</label>
                                <input type="text" id="tonalidad" name="tonalidad" required>
                            </div>
                            <div class="cell">
                                <label for="tipo-controles">Tipo de Controles</label>
                                <input type="text" id="tipo-controles" name="tipocontroles" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="cell">
                                <label for="controles-incluidos">Controles Incluidos</label>
                                <input type="text" id="controles-incluidos" name="controlesincluidos" required>
                            </div>
                            <div class="cell">
                                <label for="controles-soporta">Controles que Soporta</label>
                                <input type="text" id="controles-soporta" name="controlessoporta" required>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <h3>Características Técnicas</h3>
                        <div class="row">
                            <div class="cell">
                                <label for="tipo-procesador">Tipo de Procesador</label>
                                <input type="text" id="tipo-procesador" name="tipoprocesador" required>
                            </div>
                            <div class="cell">
                                <label for="resolucion-imagen">Resolución Imagen</label>
                                <input type="text" id="resolucion-imagen" name="resolucionimagen" required>
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <h3>Características Técnicas</h3>
                        <div class="row">
                            <div class="cell cell2">
                                <label for="plataforma">Plataforma</label>
                                <select name="plataforma" id="plataforma">
                                <?php foreach ($resultado3 as $row){?>
                                <option value="<?= $row['idPlataforma'];?>"><?= $row['idPlataforma'];?></option>
                                <?php } ?>
                                </select>

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

<script>
    function redirigir() {
        var select = document.getElementById("product-type");
        var url = select.value;

        var urlMap = {
            "Consola": "anadir-produconsolas.php",
            "Videojuego": "anadir_productos.php"
        };
        if (urlMap[url]) {
            window.location.href = urlMap[url];
        }
    }
</script>

</html>