<?php

session_start();

require_once '../../config/database.php';

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

$sql3 = $con->prepare("SELECT * FROM lenguaje WHERE estadoLenguaje = 1");
$sql3->execute();
$resultado3= $sql3->fetchAll(PDO::FETCH_ASSOC);

$sql4 = $con->prepare("SELECT * FROM plataforma WHERE estadoPlataforma = 1");
$sql4->execute();
$resultado4= $sql4->fetchAll(PDO::FETCH_ASSOC);

$sql5 = $con->prepare("SELECT * FROM tipoJuego WHERE estadoTipoJuego = 1");
$sql5->execute();
$resultado5= $sql5->fetchAll(PDO::FETCH_ASSOC);

$sql6 = $con->prepare("SELECT * FROM generoJuego WHERE estadoGeneroJuego = 1");
$sql6->execute();
$resultado6= $sql6->fetchAll(PDO::FETCH_ASSOC);

$sql7 = $con->prepare("SELECT * FROM desarrollador WHERE estadoDesarrolador = 1");
$sql7->execute();
$resultado7= $sql7->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../../css/admin/admin-productos.css">
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
                                    <a href="anadir_productos.php" style="font-size: 12px; margin-bottom: 1px;">
                                        <li>Añadir Producto</li>
                                    </a>
                                    <a href="mod_producto_con.php" style="font-size: 12px; margin-bottom: 1px;">
                                        <li>Modificar Consolas</li>
                                    </a>
                                    <a href="anadir_productos.php" style="font-size: 12px; margin-bottom: 1px;">
                                        <li>Modificar Videojuegos</li>
                                    </a>
                                    <a href="mod_desarrollador.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Modificar Desarrollador</li>
                                    </a>
                                    <a href="mod_marca.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Modificar Marca</li>
                                    </a>
                                    <a href="mod_lenguaje.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Modificar Lenguaje</li>
                                    </a>
                                    <a href="mod_genero.php"> 
                                        <li style="font-size: 12px; margin-bottom: 1px;">Modificar Genero</li>
                                    </a>
                                </ul>
                            </li>

                            <li>
                                <label for="factura">
                                <i class="fa-solid fa-money-bill-1-wave " style="font-size: 30px;" ></i> Facturas
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
                                       <li style="font-size: 12px; margin-bottom: 1px;" >Calificacion Producto-Cliente</li>
                                    </a>
                                    <a href="../calificaciones_cliente_producto/calificacion_producto-Final.php">
                                       <li style="font-size: 12px; margin-bottom: 1px;">Calificacion Producto-Final</li>
                                    </a>
                                </ul>
                            </li>

                            <li>
                                <label for="envios">
                                <i class="fa-solid fa-paper-plane"  style="font-size: 30px;"></i> Envios
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
                                    <a href="../soporte/mod_soporte.php">
                                    <li style="font-size: 12px; margin-bottom: 1px;">PQRS</li>
                                    </a>
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

            <h2>Añadir Juego</h2>


            <form action="../option_prod_vide/insert.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="product-form">
                    <div class="visuals">
                        <div class="image-placeholder-left" style="height: 400px;">
                            <div class="img-left">
                                <label for="name">banner:</label>
                                <input required class="file-input" type="file" id="banner" name="banner" style="width: 130px;">
                            </div>
                            <div class="img-left">
                                <label for="name">visual1:</label>
                                <input required class="file-input" type="file" id="visual1" name="visual1" style="width: 130px;">
                            </div>
                            <div class="img-left">
                                <label for="name">visual2:</label>
                                <input required class="file-input" type="file" id="visual2" name="visual2" style="width: 130px;">
                            </div>

                            <div class="img-left">
                                <label for="name">visual3:</label>
                                <input required class="file-input" type="file" id="visual3" name="visual3" style="width: 130px;">
                            </div>

                            <div class="img-left">
                                <label for="name">trailer:</label>
                                <input required class="file-input" type="file" id="trailer" name="trailer" style="width: 130px;">
                            </div>
                        </div>
                        <div class="image-placeholder">
                            <label for="name">Portada</label>
                            <input required class="file-input" type="file" id="portada" name="portada" style="width: 130px;">
                        </div>
                    </div>
                    <div class="product-details">
                        <label for="product-type">Tipo de producto:</label>
                        <select required id="product-type" onchange="redirigir()" name="tipoproducto">
                            <option value="Videojuego">Videojuego</option>
                            <option value="Consola">Consola</option>
                        </select>

                        <label for="developer">Marca:</label>
                        <select required id="developer" name="marca[]" multiple>
                        <?php foreach ($resultado2 as $row) {?>
                            <option value="<?= $row['idMarca'] ?>"><?= $row['idMarca'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="spanSelectMultiple">Ctrl + Click para más de una opcion</span>
                
                        <label for="price">IVA:</label>
                        <input required type="text" id="iva" name="iva">

                        <label for="price">Valor:</label>
                        <input required type="text" id="precio" name="precio">


                        <label for="name">Nombre Juego:</label>
                        <input required  type="text" id="nombre" name="nombre">

                        <label for="price">Año de lanzamiento:</label>
                        <input required type="date" id="anolanzamiento" name="anoLanzamiento">

                        <label for="price">Lenguaje:</label>
                        <select required id="developer" name="lenguaje">
                        <?php foreach ($resultado3 as $row) {?>
                            <option value="<?= $row['idLenguaje'] ?>"><?= $row['idLenguaje'] ?></option>
                            <?php } ?>
                        </select>

                        
                    </div>
                    <div class="product-details">
                        <label for="name">Garantia Juego</label>
                        <input required type="text" id="garantia" name="garantia">

                        <label for="developer">Administardor Encargado:</label>
                        <select required id="developer" name="admin">
                            <?php foreach ($resultado as $row) { ?>
                            <option value="<?= $row['idAdministrador'];?>"><?= $row['idAdministrador'];?> <?= $row['nombreUsuario'];?></option>
                            <?php } ?>

                        </select>

                        <label for="price">Plataforma:</label>
                        <select required id="developer" name="plataforma[]" multiple size="3">
                        <?php foreach ($resultado4 as $row) {?>
                            <option value="<?= $row['idPlataforma'] ?>"><?= $row['idPlataforma'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="spanSelectMultiple">Ctrl + Click para más de una opcion</span>
                        
                        <label for="price">Tipo de Juego:</label>
                        <select required id="developer" name="tipojuego">
                        <?php foreach ($resultado5 as $row) {?>
                            <option value="<?= $row['idTipoJuego'] ?>"><?= $row['idTipoJuego'] ?></option>
                            <?php } ?>
                        </select>

                        <label for="price">Genero:</label>
                        <select required id="developer" name="genero[]" multiple>
                        <?php foreach ($resultado6 as $row) {?>
                            <option value="<?= $row['idGeneroJuego'] ?>"><?= $row['idGeneroJuego'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="spanSelectMultiple">Ctrl + Click para más de una opcion</span>

                        <label for="price">Desarrollador:</label>
                        <select required id="developer" name="desarrollador">
                        <?php foreach ($resultado7 as $row) {?>
                            <option value="<?= $row['idDesarrollador'] ?>"><?= $row['idDesarrollador'] ?></option>
                            <?php } ?>
                        </select>

                        <label for="price">Stock</label>
                        <input type="number" id="stock" name="stock">

                    </div>
                </div>
                <h3>Acerca de:</h3>
                <div class="about-section">
                    <div class="container-description">
                        <h5>Sobre el Juego:</h5>
                        <textarea name="sobreJuego" id="sobreJuego"></textarea>
                    </div>
                </div>


                <h3>Configuracion:</h3>
                <div class="product-form">
                    
                    <div class="product-details">
                        <h4>Minima:</h4>
                
                        <label for="price">OS:</label>
                        <input required type="text" id="os" name="minOs">

                        <label for="price">Procesador:</label>
                        <input required type="text" id="procesador" name="minProcesador">


                        <label for="name">Memoria:</label>
                        <input required  type="text" id="memoria" name="minMemoria">

                        <label for="price">Almacenamiento:</label>
                        <input required type="text" id="almacenamiento" name="minAlmacenamiento">

                        <label for="price">Grafica:</label>
                        <input required type="text" id="grafica" name="minGrafica">

                    </div>
                    <div class="product-details">
                       <h4>Recomendada:</h4>
                        <label for="price">OS:</label>
                        <input required type="text" id="os" name="recOs">

                        <label for="price">Procesador:</label>
                        <input required type="text" id="procesador" name="recProcesador">


                        <label for="name">Memoria:</label>
                        <input required  type="text" id="memoria" name="recMemoria">

                        <label for="price">Almacenamiento:</label>
                        <input required type="text" id="almacenamiento" name="recAlmacenamiento">

                        <label for="price">Grafica:</label>
                        <input required type="text" id="grafica" name="recGrafica">

                        

                    </div>
                </div>  
                <button name="submit" class="button">Añadir Producto</button>  
                
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
            "Videojuego": "anadir_productos.php",
            "Consola": "anadir-produconsolas.php"
            };
            if (urlMap[url]) {
                window.location.href = urlMap[url];
            }
        }   
</script>

</html>