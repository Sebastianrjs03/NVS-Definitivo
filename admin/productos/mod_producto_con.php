<?php

require_once '../../config/database.php';

$db = new Database();
$con = $db->conectar();



$sql = $con->prepare("SELECT *
FROM producto as pro
INNER JOIN  usuario as us on pro.idAdministrador_crear = us.idUsuario
WHERE idTipoProducto = 'Consola'");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="shortcut icon" href="../../img/logoNVS.svg" type="svg">
    <link rel="stylesheet" href="../../css/admin/stylesadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                                    <a href="indexadmin.php" style="font-size: 12px;">
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
                                    <a href="mod_desarrollador.php"><li style="font-size: 12px; margin-bottom: 1px;">Modificar Desarrollador</li></a>
                                    <a href="mod_marca.php"><li style="font-size: 12px; margin-bottom: 1px;">Modificar Marca</li></a>
                                    <a href="mod_lenguaje.php"><li style="font-size: 12px; margin-bottom: 1px;">Modificar Lenguaje</li></a>
                                    <a href="mod_genero.php"> <li style="font-size: 12px; margin-bottom: 1px;">Modificar Genero</li></a>
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
                                <label for="envios">
                                <i class="fa-solid fa-paper-plane"  style="font-size: 30px;"></i> Envios
                                </label>
                                <input type="checkbox" id="envios">
                                <ul>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="../envios/mod_envio.php">Envios</a></li>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="../envios/mod_estadoenvio.php">Estado de envio</a></li>
                                    
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
                    <img src="../img-admin/logoNVS.svg" alt="" class="logo">
                </div>
            </aside>
        </div>


        <main class="main-content1">
            <div class="filter">
                <input type="text" placeholder="ID">
                <input type="text" placeholder="Nombre">
                <input type="text" placeholder="Apellido">
                <button>Reiniciar Filtro</button>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre Consola</th>
                            <th scope="col">Precio</th>
                            <th scope="col">IVA</th>
                            <th scope="col">Garantia</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Administrador</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php include '../options_usuario/modalUsuario.php'; ?>
                        <?php foreach ($resultado as $row) { ?>
                            <tr>
                                <th scope="row"><?= $row['idProducto']; ?></th>
                                <td><?= $row['nombreProducto']; ?></td>
                                <td><?= $row['precioProducto']; ?></td>
                                <td><?= $row['ivaProducto']; ?></td>
                                <td><?= $row['garantiaProducto']; ?></td>
                                <td><?= $row['idMarca']; ?></td>
                                <td> (<?= $row['idAdministrador_crear']; ?>) <?= $row['nombreUsuario']; ?> <?= $row['apellidoUsuario']; ?></td>

                                <td>
                                    <a href="../option_prod_con/update.php?id=<?= $row['idProducto'];?>" type="button" class="btn btn-primary" >
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </td>
                                <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="<?= $row['idAdministrador_crear']; ?>"><i class="fa-solid fa-trash"></i></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    </div>

    <?php include '../options_usuario/modaldelete.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>