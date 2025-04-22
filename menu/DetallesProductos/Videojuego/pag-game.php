<?php

require_once '../../configDetalles/config.php';
require_once '../../../config/database.php';

$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo "No se ha encontrado el producto";
    exit(); 
} else {

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token_tmp == $token) {

        $sql = "SELECT count(idProducto) FROM producto WHERE idProducto = :id and stock >= 1";
        $sql = $con->prepare($sql);
        $sql->execute([':id' => $id]);

        if ($sql->fetchColumn() > 0) {

            $consul = "SELECT * FROM producto as prod
            INNER JOIN  aux_genero as gen ON gen.fk_pk_juego = prod.idProducto
            INNER JOIN juego as jue ON jue.idJuego = prod.idProducto
            WHERE prod.idProducto = :id and prod.stock >= 1";
            $sql = $con->prepare($consul);
            $sql->execute([':id' => $id]);
            
            $sql2 = $con->prepare($consul);
            $sql2->execute([':id' => $id]);

            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
            $resultado2  = $sql2->fetchAll(PDO::FETCH_ASSOC);
          
        }
    } else {
        echo "No se ha encontrado el producto";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $resultado['nombreProducto'] ?></title>
    <link rel="stylesheet" href="../../../css/detallesProducto/stylesj.css">
    <link rel="shortcut icon" href="../../../img/logoNVS.svg" type="svg"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <div>
        <header>
            <nav>
                <div class="container-nav blurefect">
                    <img src="../../../img/logoNVS.svg" alt="" width="60vw">
                    <ul>
                        <li><a href="">Inicio</a></li>
                        <li><a href="">Videojuegos</a></li>
                        <li><a href="">Consolas</a></li>
                        <li><a href="">Nintendo</a></li>
                        <li><a href="">PlayStation</a></li>
                        <li><a href="">Xbox</a></li>
                    </ul>
                </div>
                <div class="container-nav-button">
                    <a class="blurefect" href="idxlogin/login/index.html"><i class="fa-regular fa-user"></i></a>
                    <a class="blurefect" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                    <a class="blurefect" href=""><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </nav>
        </header>

        <main class="container-principal">
            <header>
                <figure>

                    <?php
                    $permitidos = ["jpg", "jpeg", "png", "webp", "jfif", "avif"];

                    foreach ($permitidos as $per) {
                        if (file_exists("../../../imgs/juegos/banner/banner_" . $resultado['idProducto'] . "." . $per)) {
                            $imagen = "../../../imgs/juegos/banner/banner_" . $resultado['idProducto'] . "." . $per;
                            break;
                        }
                    }
                    ?>

                    <img src="<?= $imagen ?>" alt="" width="100%">
                    <div class="overlay"></div>
                    <section class="product-info">

                        <?php

                        foreach ($permitidos as $per) {
                            if (file_exists("../../../imgs/juegos/portada/portada_" . $resultado['idProducto'] . "." . $per)) {
                                $imagen = "../../../imgs/juegos/portada/portada_" . $resultado['idProducto'] . "." . $per;
                                break;
                            }
                        }
                        ?>
                        <div class="product-image">
                            <img src="<?= $imagen ?>" alt="Ghost of Tsushima: Director's Cut">
                        </div>

                        <div class="product-details blurefect">
                            <div class="pd1">
                                <h1><?= $resultado['nombreProducto'] ?></h1>
                                <p class="platform">PS5</p>
                            </div>

                            <div class="pd1">
                                <p class="price">-27%</p>
                                <span>$<?= number_format($resultado['precioProducto'], 0, ',', '.'); ?></span>
                            </div>

                            <div class="container-button ">
                                <button class="button">Agregar al Carrito</button>
                                <button class="button-like">❤️</button>
                            </div>
                        </div>

                    </section>
                </figure>
            </header>
            <section class="product-description">

                <div class="ad">
                    <h2>Acerca de:</h2>
                    <p>
                        <?= $resultado['sobreJuego'] ?>
                    </p>
                </div>
                <div class="ad2">
                    <p><strong>Desarrollador:</strong> <?= $resultado['idDesarrollador'] ?></p>
                    <p><strong>Distribuidor:</strong> PlayStation LLC</p>
                    <p><strong>Clasificación:</strong> PEGI 18</p>
                    <p><strong>Fecha de Lanzamiento:</strong> <?=$resultado['anoLanzamineto']?></p>
                 
                    <p><strong>Genero:</strong>
                
                    <?php 
                    $cont = 0;
                    $lastCont = count($resultado2) - 1;
                    foreach ($resultado2 as $genero) {?> 
                        <?= $genero['fk_pk_genero']; 
                        if ($cont < $lastCont) {?>, <?php $cont++;} else {?>. <?php } ?>
                    <?php } ?>
                    </p>
                </div>
            </section>

            <section class="visuals">

                <div class="visuals-gallery">
                    <div class="main-visual">

                      <?php 
                        
                        $permitidosVid = ["mp4", "avi", "mpeg", "quicktime", "webm", "x-ms-wmv", "x-flv"];

                        foreach ($permitidosVid as $per) {
                            if (file_exists("../../../imgs/juegos/trailer/trailer_" . $resultado['idProducto'] . "." . $per)) {
                                $video = "../../../imgs/juegos/trailer/trailer_" . $resultado['idProducto'] . "." . $per;
                                break;
                            }
                        }
                      ?>
                        <video autoplay controls poster="<?= $imagen ?>">
                            <source src="<?=$video?>" type="video/mp4">
                            Tu navegador no soporta la etiqueta de video.
                        </video>
                    </div>
                    <div class="thumbnail-visuals">
                        <?php

                        foreach ($permitidos as $per) {
                            if (file_exists("../../../imgs/juegos/visuales/visual1_" . $resultado['idProducto'] . "." . $per)) {
                                $imagen0 = "../../../imgs/juegos/visuales/visual1_" . $resultado['idProducto'] . "." . $per;
                                break;
                            }
                        }
                        
                        foreach ($permitidos as $per) {
                            if (file_exists("../../../imgs/juegos/visuales/visual2_" . $resultado['idProducto'] . "." . $per)) {
                                $imagen1 = "../../../imgs/juegos/visuales/visual2_" . $resultado['idProducto'] . "." . $per;
                                break;
                            }
                        }
                        foreach ($permitidos as $per) {
                            if (file_exists("../../../imgs/juegos/visuales/visual3_" . $resultado['idProducto'] . "." . $per)) {
                                $imagen2 = "../../../imgs/juegos/visuales/visual3_" . $resultado['idProducto'] . "." . $per;
                                break;
                            }
                        }

                        ?>

                        <img src="<?=$imagen0?>" alt="Visual 2">
                        <img src="<?=$imagen1?>" alt="Visual 3">
                        <img src="<?=$imagen2?>" alt="Visual 4">
                    </div>
                </div>
            </section>

            <section class="system-requirements">
                <h2>Configuracion</h2>
                <div class="requirements">
                    <div class="minimum">
                        <h3>Minima</h3>
                        <ul>
                            <li><strong>OS:</strong> Windows 10 64-bit</li>
                            <li><strong>Procesador:</strong> Intel Core i3-7100 or AMD Ryzen 3 1200</li>
                            <li><strong>Memory:</strong> 8 GB RAM</li>
                            <li><strong>Almacenamiento:</strong> 75 GB available space</li>
                            <li><strong>Gráfica:</strong> NVIDIA GeForce GTX 960</li>
                        </ul>
                    </div>
                    <div class="recommended">
                        <h3>Recomendada</h3>
                        <ul>
                            <li><strong>OS:</strong> Windows 10 64-bit</li>
                            <li><strong>Procesador:</strong> Intel Core i5-8600 or AMD Ryzen 5 3600</li>
                            <li><strong>Memory:</strong> 16 GB RAM</li>
                            <li><strong>Almacenamiento:</strong> 75 GB available space</li>
                            <li><strong>Gráfica:</strong> NVIDIA GeForce RTX 2060</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="comments-section">
                <h2>Comentarios (10)</h2>
                <div class="comments">
                    <div class="comment">
                        <div class="user-info">
                            <img src="img-paggc/user.png" alt="Nicolas Ramirez">
                            <p class="user-name">Nicolas Ramirez</p>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                        </div>
                        <p>Me gustó mucho :)</p>
                        <p class="comment-date">Hace un mes</p>
                    </div>
                    <div class="comment">
                        <div class="user-info">
                            <img src="img-paggc/user.png" alt="Mojan Rojas">
                            <p class="user-name">Mojan Rojas</p>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                        </div>
                        <p>Increíble</p>
                        <p class="comment-date">Hace un mes</p>
                    </div>
                    <div class="comment">
                        <div class="user-info">
                            <img src="img-paggc/user.png" alt="Andres Messi">
                            <p class="user-name">Andres Messi</p>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                        </div>
                        <p>Ta re piola pa</p>
                        <p class="comment-date">Hace un mes</p>
                    </div>
                </div>

                <div class="rating-summary">
                    <div class="average-rating">
                        <p>4.5</p>
                    </div>
                    <div class="rs">
                        <div>
                            <strong>Puntuacion media de las reseñas</strong>
                        </div>
                        <div>
                            <p>Basada en 115 reseñas</p>
                        </div>

                    </div>
                    <a href="#modal4"><button class="button-reseña"><strong> Reseñar</strong></button></a>
                </div>

            </section>

            <div id="modal4" class="modal4">
                <div class="modal4-content">
                    <a href="#" class="close">&times;</a>
                    <h2>Reseña</h2>
                    <form>
                        <label for="nombre"><strong>Clasificación:</strong>⭐⭐⭐⭐⭐</label>
                        <textarea name="" id="">Comenta algo...</textarea>

                        <button class="button-reseñar" type="submit">Reseñar</button>
                    </form>
                </div>
            </div>

        </main>
        <footer>
            <div class="container-footer">
                <div class="p1">
                    <article class="cont-footer-cont">
                        <div>
                            <span>NVS</span>
                            <ul>
                                <li>Contactenos</li>
                                <li>Nosotros</li>
                                <li>Ubicación</li>
                            </ul>
                        </div>
                        <div>
                            <span>COMPRAR</span>
                            <ul>
                                <li>Lista de juegos</li>
                                <li>Lista de consolas</li>
                                <li>como comprar</li>
                            </ul>
                        </div>
                        <div>
                            <span>AYUDA</span>
                            <ul>
                                <li>Política de devolución</li>
                                <li>Mapa de sitio</li>
                                <li>Terminos y condiciones</li>
                            </ul>
                        </div>
                    </article>

                    <section>
                        <span>CALIFICANOS</span>
                        <img src="img-paggc/starss.jpeg" alt="" width="40%">
                    </section>
                </div>
                <div class="p2">
                    <section>
                        <span>
                            PQRS
                        </span>
                        <textarea name="" id="" placeholder="Deja un comentario..."></textarea>
                    </section>
                    <section>
                        <span>SÍGUENOS</span>
                        <img src="img-paggc/sigenos.jpeg" alt="" width="30%">
                    </section>
                </div>
            </div>
            <div class="p3">
                <p>Copyright © 2024 NVS. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>
</body>

</html>