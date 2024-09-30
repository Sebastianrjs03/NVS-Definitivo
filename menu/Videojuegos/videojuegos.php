<?php


require_once '../configDetalles/config.php';
require_once '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$sql = $con -> prepare("SELECT * FROM producto WHERE idTipoProducto = 'Videojuego' and stock >= 1 LIMIT 9");

$sql -> execute();

$resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" value="notranslate">
    <link rel="stylesheet" href="../../css/videojuegos/style.css">
    <link rel="shortcut icon" href="../../img/logoNVS.svg" type="svg">
    <title>NVS | Tienda de Videojuegos</title>
</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar">
                <div class="container-nav blurefect">
                    <img src="../../img/logoNVS.svg" alt="" width="40vh">
                    <ul>
                        <li><a href="../../index.php">Inicio</a></li>
                        <li><a href="videojuegos.html">Videojuegos</a></li>
                        <li><a href="../Consolas/consolas.php">Consolas</a></li>
                        <li><a href="../Nintendo/nintendo.html">Nintendo</a></li>
                        <li><a href="../Playstation/playstation.html">PlayStation</a></li>
                        <li><a href="../Xbox/xbox.html">Xbox</a></li>
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
                    <img src="../../img/videojuegos/5679.jpg" alt="" width="100%">
                    <div class="text-img-banner">
                        <span>Red Dead Redeption II
                        </span>
                        <div class="price">
                            <button class="button-info">INFO</button>
                            <div class="cont-price">
                                <span class="price-one">
                                    $4.000.000
                                </span>
                                <span class="price-two">
                                    $3.500.000
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </figure>
            </header>
            <div class="span">
                <span>
                    Lo más vendido
                </span>
            </div>
            <section class="container-juegos">

                <?php 
                foreach($resultado as $row => $resultado){
                 $area = 'j'. ($row + 1);   
                    ?>
                    
                 <?php 
                    $permitidos = ["jpg", "jpeg", "png", "webp", "jfif", "avif"];

                    foreach ($permitidos as $permitidos){
                        if(file_exists("../../imgs/juegos/portada/portada_".$resultado['idProducto'].".".$permitidos)){
                            $imagen = "../../imgs/juegos/portada/portada_".$resultado['idProducto'].".".$permitidos;
                        }
                    }
                 ?>   
            
                <a href="../DetallesProductos/Videojuego/pag-game.php?id=<?=$resultado['idProducto']; ?>&token=<?=
                hash_hmac('sha1', $resultado['idProducto'], KEY_TOKEN)?>" class="j1" style="grid-area:<?=$area?>;">
                    <div class="img-card">
                        <img src="<?=$imagen?>" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            <?= $resultado['nombreProducto'];?>
                        </span>
                        <span class="price-card">
                            $<?= number_format($resultado['precioProducto'],0, ',','.');?>
                        </span>
                    </div>
                </a>
                <?php } ?> 
                

            </section>
            <div class="span2">
                <span>
                    Filtra por tus preferencias
                </span>
            </div>
            <section class="container-pre">
                <a class="pre1" style="grid-area: pre1;">
                    <p>Acción</p>
                </a>
                <div class="pre1" style="grid-area: pre2;">
                    <p>Arcade</p>
                </div>
                <div class="pre1" style="grid-area: pre3;">
                    <p>Aventura</p>
                </div>
                <div class="pre1" style="grid-area: pre4;">
                    <p>Estrategia</p>
                </div>
                <div class="pre1" style="grid-area: pre5;">
                    <p>FPS</p>
                </div>
                <div class="pre1" style="grid-area: pre6;">
                    <p>RPG</p>
                </div>
                <div class="pre1" style="grid-area: pre7;">
                    <p>Simulación</p>
                </div>
                <div class="pre1" style="grid-area: pre8;">
                    <p>Solitario</p>
                </div>
                <div class="pre1" style="grid-area: pre9;">
                    <p>VR</p>
                </div>
                <div class="pre1" style="grid-area: pre10;">
                    <p>Lucha</p>
                </div>
            </section>
            <span class="span3">
                <button>VER MÁS</button>
            </span>

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
                        <img src="img/Footer/Captura de pantalla 2024-08-20 000440.png" alt="" width="40%">
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
                        <img src="../../img/Footer/Captura de pantalla 2024-08-20 010228.png" alt="" width="30%">
                    </section>
                </div>
            </div>
            <div class="p3">
                <p>Copyright © 2024 NVS. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>
    <script src="https://kit.fontawesome.com/dad546a167.js" crossorigin="anonymous"></script>
</body>

</html>