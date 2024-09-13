<?php

require '../config/database.php';

$db = new Database();
$con = $db->conectar();


$sql = $con->prepare("SELECT * FROM factura");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="shortcut icon" href="../img/logoNVS.svg" type="svg">
    <link rel="stylesheet" href="../css/admin/stylesadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                                <label for="factura">
                                    <i class="fas fa-box" style="font-size: 30px;"></i> Facturas
                                </label>
                                <input type="checkbox" id="factura">
                                <ul>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="indexadmin.php">Ver Forma Pago</a></li>
                                    <li style="font-size: 12px; margin-bottom: 1px;"><a href="factura.php">Ver Facturas</a></li>
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


        <main class="main-content">
            <div class="filter">
                <input type="text" placeholder="idFactura">
                <input type="text" placeholder="fechaFactura">
                <input type="text" placeholder="totalCompra">
                <input type="text" placeholder="Cliente">
                <input type="text" placeholder="forma de pago">
                <input type="text" placeholder="Direccion">
                <button>Reiniciar Facturas</button>
            </div>
    <div class="container">     
        <div class="table-responsive">
            <table class="table table-striped table-dark" >
                <thead>
                    <tr>
                        <th scope="col">N Factura</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">IVA</th>
                        <th scope="col">Base</th>
                        <th scope="col">Total</th>
                        <th scope="col">Puntos Gastados</th>
                        <th scope="col">Descuento X puntos</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Puntos Cliente</th>
                        <th scope="col">Forma Pago</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
    
                    </tr>
                </thead>
                <tbody>
                <?php include 'options_usuario_factura/modalusuariofac.php'; ?>
                    <?php foreach ($resultado as $row) { ?>
                        <tr>
                            <th scope="row"><?php echo $row['idFactura']; ?></th>
                            <td><?= $row['fechaFactura']; ?></td>
                            <td><?= $row['iva']; ?></td>
                            <td><?php echo $row['base']; ?></td>
                            <td><?php echo $row['totalCompra']; ?></td>
                            <td><?php echo $row['descontarPuntos']; ?></td>
                            <td><?php echo $row['descuentoGenerado']; ?></td>
                            <td><?php echo $row['idCliente']; ?></td>
                            <td><?php echo $row['idPuntosCliente'];?></td>
                            <td><?php echo $row['idFormaPago']; ?></td>
                            <td><?php echo $row['fk_pk_direccion'];?></td>
                            <td>
                                <button type="button"
                                    class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="<?= $row['idFactura'] ?>">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                            </td>
                            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="<?= $row['idFactura'] ?>"><i class="fa-solid fa-trash"></i></button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

            <section>
                <button type="button"
                    class="btn btn-primary";
                    data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="fa-solid fa-plus"></i> Nueva Factura
                </button>
                <?php include 'options_usuario_factura/modalInsertfac.php'; ?>
            </section>
    </div>

    <?php include 'options_usuario_factura/modaldeletefac.php'; ?>
    <script>
        let editamodal = document.getElementById('exampleModal')
        let eliminamodal = document.getElementById('deleteModal')

        editamodal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            let inputid = editamodal.querySelector('.modal-body #id')
            let inputfechaFactura = editamodal.querySelector('.modal-body #fechaFactura')
            let inputiva = editamodal.querySelector('.modal-body #iva')
            let inputbase = editamodal.querySelector('.modal-body #base')
            let inputtotalCompra = editamodal.querySelector('.modal-body #totalCompra')
            let inputdescontarPuntos = editamodal.querySelector('.modal-body #descontarPuntos')
            let inputdescuentoGenerado = editamodal.querySelector('.modal-body #descuentoGenerado')

            let url = "options_usuario_factura/getUsuariofac.php"
            let formData = new FormData()
            formData.append('id', id)

            fetch(url, {
                    method: "POST",
                    body: formData
                }).then(response => response.json())
                .then(data => {

                    inputid.value = data.idFactura
                    inputfechaFactura.value = data.fechaFactura
                    inputiva.value = data.iva
                    inputbase.value = data.base
                    inputtotalCompra.value = data.totalCompra
                    inputdescontarPuntos.value = data.descontarPuntos
                    inputdescuentoGenerado.value = data.descuentoGenerado

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