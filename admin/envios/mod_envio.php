<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


$sql = $con->prepare("SELECT * FROM envios");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql_Factura = $con->prepare("SELECT * FROM factura");
$sql_Factura->execute();
$resultado_Factura = $sql_Factura->fetchAll(PDO::FETCH_ASSOC);

$sql_EstadoEnvio = $con->prepare("SELECT * FROM estadoenvio");
$sql_EstadoEnvio->execute();
$resultado_EstadoEnvio = $sql_EstadoEnvio->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="shortcut icon" href="../img/logoNVS.svg" type="svg">
    <link rel="stylesheet" href="../../css/admin/stylesadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container1">
        <div class="sidebar">
            <aside>
                <div class="profile">
                    <img src="../../admin/img-admin/setting.png" alt="">
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
                                    <a href="mod_envio.php">
                                        <li style="font-size: 12px; margin-bottom: 1px;">Envios</li>
                                    </a>
                                    <a href="mod_estadoenvio.php">
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
                    <img src="../../admin/img-admin/logoNVS.svg" alt="" class="logo">
                </div>
            </aside>
        </div>


        <main>
            <div class="filter">
                <input type="text" placeholder="ID">
                <input type="text" placeholder="NombreProducto">
                <input type="text" placeholder="Tipo">
                <button>Reiniciar Filtro</button>
            </div>

            <div class="contenedor_Tabla">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">factura</th>
                            <th scope="col">Tiempo Estimado</th>
                            <th scope="col">Observaciones</th>
                            <th scope="col">Estado envio</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php include '../options_envios/examplemodal.php'; ?>
                        <?php foreach ($resultado as $row) { ?>
                            <tr>
                                <th scope="row"><?php echo $row['fk_pk_Factura']; ?></th>
                                <td><?= $row['tiempoEstimado']; ?></td>
                                <td><?= $row['observaciones']; ?></td>
                                <td><?php echo $row['idEstadoEnvio']; ?></td>


                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-id="1"><i
                                            class="fa-solid fa-pen"></i></button>
                                </td>
                                <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        data-bs-id="<?= $row['fk_pk_Factura'] ?>"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <section>
                <button type="button" class="btn btn-primary" style="background-color: #4415A2; border: none;"
                    data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="fa-solid fa-plus"></i> Nuevo Envio
                </button>
                <?php include '../options_envios/modalInsert.php'; ?>


            </section>
    </div>
    </div>

    <?php include '../options_envios/modaldelete.php'; ?>
    <script>

        let editamodal = document.getElementById('exampleModal');

        editamodal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget;
            let id = button.getAttribute('data-bs-id');

            let inputId = editamodal.querySelector('.modal-body #id');
            let inputEstado = editamodal.querySelector('.modal-body #estadoDesarrollador');


            let url = "../options_desarrollador/getdesarrollador.php";
            let formData = new FormData();
            formData.append('id', id);

            fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
                .then(data => {
                    console.log(data);
                    inputId.value = data.idEnvio;
                    inputEstado.value = data.estadoDesarrollador;
                })
                .catch(err => console.log(err));
        });


        let eliminamodal = document.getElementById('deleteModal');

        eliminamodal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget;
            let id = button.getAttribute('data-bs-id');
            eliminamodal.querySelector('.modal-footer #id').value = id;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>