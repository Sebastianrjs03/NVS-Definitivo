<?php

require '../config/database.php';

$db = new Database();
$con = $db->conectar();


$sql = $con->prepare("SELECT * FROM historialpuntos");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql_Cliente = $con->prepare("SELECT * FROM cliente");
$sql_Cliente->execute();
$resultado_Cliente = $sql_Cliente->fetchAll(PDO::FETCH_ASSOC);

$sql_Factura = $con->prepare("SELECT * FROM factura");
$sql_Factura->execute();
$resultado_Factura = $sql_Factura->fetchAll(PDO::FETCH_ASSOC);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
</head>

<body>
    <div class="container1">
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
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="mod_producto.html">Modificar Producto</a></li>
                                </ul>
                            </li>

                            <li>
                                <label for="puntos">
                                    <i class="fas fa-star" style="font-size: 30px;"></i> Puntos
                                </label>
                                <input type="checkbox" id="puntos">
                                <ul>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="historial-puntos.php">Historial de Puntos</a></li>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="mod_puntoscli.php">Puntos Clientes</a></li>
                                </ul>
                            </li>

                            <li>
                                <label for="soporte">
                                    <i class="bi bi-bar-chart-line-fill" style="font-size: 30px;"></i> Calificaciones
                                </label>
                                <input type="checkbox" id="soporte">
                                <ul>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="calificacion_producto-Cliente.php">Calificacion Producto-Cliente</a></li>
                                </ul>
                                <ul>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="calificacion_producto-Final.php">Calificacion Producto-Final</a></li>
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


        <main class="main-content1">
            <div class="filter">
                <input type="text" placeholder="ID factura">
                <input type="text" placeholder="ID Cliente">
                <input type="text" placeholder="Puntos generados">
                <button>Reiniciar Filtro</button>
            </div>

            <table class="table table-striped table-dark">
                <thead>
                    <tr style="text-align: center">
                        <th scope="col">ID Factura</th>
                        <th scope="col">ID Cliente</th>
                        <th scope="col">Puntos Generados</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>

                    </tr>
                </thead>
                <tbody>
                <?php include '../options_historial_puntos/modalUsuario.php'; ?>
                    <?php foreach ($resultado as $row) { ?>
                        <tr >
                            <th scope="row"><?php echo $row['pk_fk_Factura']; ?></th>
                            <td><?= $row['idCliente']; ?></td>
                            <td><?= $row['puntosGenerados']; ?></td>

                            <td>
                                <button type="button"
                                    class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="<?= $row['pk_fk_Factura']?>">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                            </td>
                            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="<?= $row['pk_fk_Factura']?>"><i class="fa-solid fa-trash"></i></button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <section>
                <button type="button"
                    class="btn btn-primary" style="background-color: #4415A2; border: none;"
                    data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="fa-solid fa-plus"></i> Nuevo Historial
                </button>
                <?php include '../options_historial_puntos/modalinsert.php'; ?>


            </section>
    </div>

    <?php include '../options_historial_puntos/modaldelete.php'; ?>
    <script>
        let editamodal = document.getElementById('exampleModal')
        let eliminamodal = document.getElementById('deleteModal')

        editamodal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            let inputid = editamodal.querySelector('.modal-body #id')
            let inputpuntosGenerados = editamodal.querySelector('.modal-body #puntosGenerados')

            let url = "../options_historial_puntos/getusuario.php"
            let formData = new FormData()
            formData.append('id', id)

            fetch(url, {
                    method: "POST",
                    body: formData
                }).then(response => response.json())
                .then(data => {

                    inputid.value = data.pk_fk_Factura
                    inputpuntosGenerados.value = data.puntosGenerados

                }).catch(err => console.log(err))
        })

        eliminamodal.addEventListener('shown.bs.modal', event => {

            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            eliminamodal.querySelector('.modal-footer #id').value = id 

        })
    </script>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>