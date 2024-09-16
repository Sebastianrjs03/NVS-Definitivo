<?php

require_once '../../config/database.php';

$db = new Database();

$con = $db->conectar();



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../../css/admin/admin-productos.css">
    <link rel="shortcut icon" href="../../img/logoNVS.svg" type="svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container1">
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


        <div class="main-content1">
            <h1>Añadir Producto</h1>
            <div class="product-form">
                <div class="visuals">
                    <div class="image-placeholder">
                        <a href="#modal">Visuales</a>
                    </div>
                </div>
                <div class="product-details">
                    <label for="product-type">Tipo de producto:</label>
                    <select id="product-type" onchange="redirigir()">
                        <option value="Videojuego">Videojuego</option>
                        <option value="Consola">Consola</option>
                    </select>

                    <label for="platform">Plataforma:</label>
                    <select id="platform">
                        <option value="ps5">PS5</option>
                        <option value="ps5">PS4</option>
                        <option value="ps5">XBOX/S</option>
                        <option value="ps5">Nintendo</option>

                    </select>

                    <label for="developer">Desarrollador:</label>
                    <select id="developer">
                        <option>RockStar</option>
                        <option>Activision Blizzard</option>
                        <option>Electronic Arts</option>
                        <option>EA plays</option>
                    </select>

                    <label for="price">Valor:</label>
                    <input type="text" id="precio">

                    <label for="name">Nombre Juego:</label>
                    <input type="text" id="nombrej">
                </div>
            </div>
            <h3>Acerca de:</h3>
            <div class="about-section">
                <div class="container-description">
                    <textarea name="" id="">Descripcion...</textarea>
                </div>

                <div class="container-description, product-details2">
                    <label for="price">Desarrollador:</label>
                    <input type="text" id="des">
                    <label for="name">Distribuidora</label>
                    <input type="text" id="dis">
                    <label for="name">Clacificacion</label>
                    <input type="text" id="dis">
                    <label for="name">Fecha de lanzamiento</label>
                    <input type="text" id="dis">
                    <label for="name">Genero</label>
                    <input type="text" id="dis">
                </div>
            </div>


            <h3>Configuración:</h3>
            <div class="about-section">
                <div class="container-description, product-details2">
                    <h4>Configuración minima:</h4>
                    <label for="price">OS:</label>
                    <input type="text" id="des">
                    <label for="name">Procesador:</label>
                    <input type="text" id="dis">
                    <label for="name">Memoria:</label>
                    <input type="text" id="dis">
                    <label for="name">Almacenamiento</label>
                    <input type="text" id="dis">
                    <label for="name">Grafica:</label>
                    <input type="text" id="dis">
                </div>

                <div class="container-description, product-details2">
                    <h4>Configuración Recomendada:</h4>
                    <label for="price">OS:</label>
                    <input type="text" id="des">
                    <label for="name">Procesador:</label>
                    <input type="text" id="dis">
                    <label for="name">Memoria:</label>
                    <input type="text" id="dis">
                    <label for="name">Almacenamiento</label>
                    <input type="text" id="dis">
                    <label for="name">Grafica:</label>
                    <input type="text" id="dis">
                </div>
            </div>
            <button class="button">Añadir Producto</button>

            <div id="modal" class="modal">
                <div class="modal-content">
                    <a href="#" class="close">&times;</a>
                    <h2>Añadir Visuales</h2>
                    <div class="container-description2, product-details3">

                        <label for="name">Portada:</label>
                        <input type="file" id="dis" class="file-input">

                        <label for="name">Imagenes Consola:</label>
                        <input type="file" id="dis" class="file-input">
                        <input type="file" id="dis" class="file-input">
                        <input type="file" id="dis" class="file-input">


                    </div>
                    <button class="button">Añadir</button>
                </div>
            </div>


        </div>
    </div>

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