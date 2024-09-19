<?php

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
                                    <a href="indexadmin.php" style="font-size: 12px;">
                                        <li>Modificar Usuarios</li>
                                    </a>
                                    <a href="indexadmin.php" style="font-size: 12px;">
                                        <li>Modificar Cliente</li>
                                    </a>
                                    <a href="indexadmin.php" style="font-size: 12px;">
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
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="anadir_productos.html">Añadir Producto</a></li>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="mod_producto.php">Modificar Producto</a></li>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="mod_desarrollador.php">Modificar Desarrolador</a></li>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="mod_marca.php">Modificar Marca</a></li>
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
            <h2>Añadir Juego</h2>

            <form action="option_prod_con/insert.php" method="post">
                <div class="product-form">
                    <div class="visuals">
                        <div class="image-placeholder-left" style="height: 400px;">
                            <div class="img-left">
                                <label for="name">banner:</label>
                                <input class="file-input" type="file" id="formFile" style="width: 130px;">
                            </div>
                            <div class="img-left">
                                <label for="name">visual1:</label>
                                <input class="file-input" type="file" id="formFile" style="width: 130px;">
                            </div>
                            <div class="img-left">
                                <label for="name">visual2:</label>
                                <input class="file-input" type="file" id="formFile" style="width: 130px;">
                            </div>

                            <div class="img-left">
                                <label for="name">visual3:</label>
                                <input class="file-input" type="file" id="formFile" style="width: 130px;">
                            </div>

                            <div class="img-left">
                                <label for="name">trailer:</label>
                                <input class="file-input" type="file" id="formFile" style="width: 130px;">
                            </div>
                        </div>
                        <div class="image-placeholder">
                            <label for="name">Portada</label>
                            <input class="file-input" type="file" id="formFile" style="width: 130px;">
                        </div>
                    </div>
                    <div class="product-details">
                        <label for="product-type">Tipo de producto:</label>
                        <select id="product-type" onchange="redirigir()" name="tipoproducto">
                            <option value="Videojuego">Videojuego</option>
                            <option value="Consola">Consola</option>
                        </select>

                        <label for="developer">Marca:</label>
                        <select id="developer" name="marca">
                        <?php foreach ($resultado2 as $row) {?>
                            <option value="<?= $row['idMarca'] ?>"><?= $row['idMarca'] ?></option>
                            <?php } ?>
                        </select>
                
                        <label for="price">IVA:</label>
                        <input type="text" id="iva" name="iva">

                        <label for="price">Valor:</label>
                        <input type="text" id="precio" name="precio">


                        <label for="name">Nombre Juego:</label>
                        <input  type="text" id="nombre" name="nombre">

                        <label for="price">Año de lanzamiento:</label>
                        <input type="text" id="anolan" name="anola">

                        <label for="price">Lenguaje:</label>
                        <select id="developer" name="lenguaje">
                        <?php foreach ($resultado3 as $row) {?>
                            <option value="<?= $row['idLenguaje'] ?>"><?= $row['idLenguaje'] ?></option>
                            <?php } ?>
                        </select>

                        
                    </div>
                    <div class="product-details">
                        <label for="name">Garantia Juego</label>
                        <input type="text" id="garantia" name="garantia">

                        <label for="developer">Administardor Encargado:</label>
                        <select id="developer" name="admin">
                            <?php foreach ($resultado as $row) { ?>
                            <option value="<?= $row['idAdministrador'];?>"><?= $row['idAdministrador'];?> <?= $row['nombreUsuario'];?></option>
                            <?php } ?>

                        </select>

                        <label for="price">Plataforma:</label>
                        <select id="developer" name="plataforma">
                        <?php foreach ($resultado4 as $row) {?>
                            <option value="<?= $row['idPlataforma'] ?>"><?= $row['idPlataforma'] ?></option>
                            <?php } ?>
                        </select>
                        
                        <label for="price">Tipo de Juego:</label>
                        <select id="developer" name="tipojuego">
                        <?php foreach ($resultado5 as $row) {?>
                            <option value="<?= $row['idTipoJuego'] ?>"><?= $row['idTipoJuego'] ?></option>
                            <?php } ?>
                        </select>

                        <label for="price">Genero:</label>
                        <select id="developer" name="genero">
                        <?php foreach ($resultado6 as $row) {?>
                            <option value="<?= $row['idGeneroJuego'] ?>"><?= $row['idGeneroJuego'] ?></option>
                            <?php } ?>
                        </select>

                        <label for="price">Desarrollador:</label>
                        <select id="developer" name="desarrollador">
                        <?php foreach ($resultado7 as $row) {?>
                            <option value="<?= $row['idDesarrollador'] ?>"><?= $row['idDesarrollador'] ?></option>
                            <?php } ?>
                        </select>

                        <label for="price">Estado:</label>
                        <input type="text" id="estado" name="estado">


                        



                    </div>
                </div>
                <h3>Acerca de:</h3>
                <div class="about-section">
                    <div class="container-description">
                        <h5>Sobre el Juego:</h5>
                        <textarea name="sobrej" id="sobrej"></textarea>
                    </div>
                </div>


                <h3>Configuracion:</h3>
                <div class="product-form">
                    
                    <div class="product-details">
                        <h4>Minima:</h4>
                
                        <label for="price">OS:</label>
                        <input type="text" id="os" name="os">

                        <label for="price">Procesador:</label>
                        <input type="text" id="procesador" name="procesador">


                        <label for="name">Memoria:</label>
                        <input  type="text" id="memoria" name="memoria">

                        <label for="price">Almacenamiento:</label>
                        <input type="text" id="almacenamiento" name="almacenamiento">

                        <label for="price">Grafica:</label>
                        <input type="text" id="grafica" name="grafica">

                    </div>
                    <div class="product-details">
                       <h4>Recomendada:</h4>
                        <label for="price">OS:</label>
                        <input type="text" id="os" name="os">

                        <label for="price">Procesador:</label>
                        <input type="text" id="procesador" name="procesador">


                        <label for="name">Memoria:</label>
                        <input  type="text" id="memoria" name="memoria">

                        <label for="price">Almacenamiento:</label>
                        <input type="text" id="almacenamiento" name="almacenamiento">

                        <label for="price">Grafica:</label>
                        <input type="text" id="grafica" name="grafica">

                        

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
            "Videojuego": "anadir_productos.php",
            "Consola": "anadir-produconsolas.php"
            };
            if (urlMap[url]) {
                window.location.href = urlMap[url];
            }
        }   
</script>

</html>