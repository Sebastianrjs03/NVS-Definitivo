<?php

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();


$sql = $con->prepare("SELECT ad.idAdministrador, .ad.documentoAdministrador, ad.pf_fk_tdoc, 
us.contrasenaUsuario, us.nombreUsuario, us.celularUsuario, us.correoUsuario,
tp.desc_tdoc 
FROM administrador as ad 
INNER JOIN usuario as us on ad.idAdministrador = us.idUsuario
INNER JOIN tipo_documento as tp on ad.pf_fk_tdoc = tp.t_doc");


$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

$consul2 = ("SELECT * FROM tipo_documento");
$sql2 = $con->prepare($consul2);
$sql2->execute();
$resultado2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

$consul3 = ("SELECT * FROM usuario");
$sql3 = $con->prepare($consul3);
$sql3->execute();
$resultado3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="shortcut icon" href="../../img/logoNVS.svg" type="svg">
    <link rel="stylesheet" href="../../css/admin/stylesadmin.css">
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
                                        <li>Añadir Producto</li>
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
                            <th scope="col">Documento</th>
                            <th scope="col">tipo de documento</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Correo</th>
                            <th scope="col">contraseña</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php include '../options_admin/modalUsuario.php'; ?>
                        <?php foreach ($resultado as $row) { ?>
                            <tr>
                                <th scope="row"><?php echo $row['idAdministrador']; ?> <?php echo $row['nombreUsuario']; ?></th>
                                <td><?= $row['documentoAdministrador']; ?></td>
                                <td><?= $row['pf_fk_tdoc']; ?> <?= $row['desc_tdoc']; ?></td>
                                <td><?php echo $row['celularUsuario']; ?></td>
                                <td><?php echo $row['correoUsuario']; ?></td>
                                <td><?php echo $row['contrasenaUsuario']; ?></td>

                                <td>
                                    <button type="button"
                                        class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal" data-bs-id="<?= $row['idAdministrador']; ?>">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </td>
                                <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="<?= $row['idAdministrador'] ?>"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <section>
                <button type="button"
                    class="btn btn-primary" style="background-color: #4415A2; border: none;"
                    data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="fa-solid fa-plus"></i> Nuevo admin
                </button>
                <?php include '../options_admin/modalinsert.php'; ?>
            </section>
    </div>

    <?php include '../options_admin/modaldelete.php'; ?>
    <script>
        let editamodal = document.getElementById('editarModal')
        let eliminamodal = document.getElementById('deleteModal')

        editamodal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            let inputId = editamodal.querySelector('.modal-body #id')
            let inputNombre = editamodal.querySelector('.modal-body #nombre')
            let inputSeNombre = editamodal.querySelector('.modal-body #senombre')
            let inputApellido = editamodal.querySelector('.modal-body #apellido')
            let inputSeApellido = editamodal.querySelector('.modal-body #seapellido')
            let inputCelular = editamodal.querySelector('.modal-body #celular')
            let inputContraseña = editamodal.querySelector('.modal-body #contraseña')
            let inputCorreo = editamodal.querySelector('.modal-body #correo')

            let url = "../options_admin/getusuario.php"
            let formData = new FormData()
            formData.append('id', id)

            fetch(url, {
                    method: "POST",
                    body: formData
                }).then(response => response.json())
                .then(data => {

                    inputId.value = data.idUsuario
                    inputNombre.value = data.nombreUsuario
                    inputSeNombre.value = data.senombreUsuario
                    inputApellido.value = data.apellidoUsuario
                    inputSeApellido.value = data.seapellidoUsuario
                    inputCelular.value = data.celularUsuario
                    inputContraseña.value = data.contrasenaUsuario
                    inputCorreo.value = data.correoUsuario

                }).catch(err => console.log(err))
        })

        eliminamodal.addEventListener('shown.bs.modal', event => {

            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            eliminamodal.querySelector('.modal-footer #id').value = id

        })
    </script>
    <script src="https://kit.fontawesome.com/dad546a167.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>