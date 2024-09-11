<?php

require 'config/database.php';

    $db = new Database();
    $con = $db->conectar();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" value="notranslate">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="img/logoNVS.svg" type="svg">
    <title>NVS | Tienda de Videojuegos</title>
</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar">
                <div class="container-nav blurefect">
                    <img src="img/logoNVS.svg" alt="" width="40vh">
                    <ul>
                        <li><a href="">Inicio</a></li>
                        <li><a href="menu/Videojuegos/videojuegos.html">Videojuegos</a></li>
                        <li><a href="menu/Consolas/consolas.html">Consolas</a></li>
                        <li><a href="menu/Nintendo/nintendo.html">Nintendo</a></li>
                        <li><a href="menu/Playstation/playstation.html">PlayStation</a></li>
                        <li><a href="menu/Xbox/xbox.html">Xbox</a></li>
                    </ul>
                </div>
                <div class="container-nav-button">
                    <a class="blurefect" href="idxlogin/login/index.html"><i class="fa-regular fa-user"></i></a>
                    <a class="blurefect" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                    <a class="blurefect" href="carrito/index.html"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </nav>
        </header>
        <section class="container-banners">
            <figure class="A1" style="grid-area:A1 ;">
                <div class="cont-left">
                    <div class="img-left">
                        <img src="img/imgXbox.png" alt="" width="80%">
                    </div>
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
            <figure class="A2" style="grid-area:A2 ;">
                <div class="cont-rigth">
                    <div class="img-right"></div>
                    <img class="imgXboxConsole" src="img/imgXboxRight.png" alt="" width="100%">
                    <img src="img/Captura de pantalla 2024-08-16 001558.png" alt="" width="100%">
                </div>
                <div class="overlay"></div>
            </figure>
            <figure class="B1" style="grid-area:B1 ;">
                <div class="cont-left">
                    <div class="img-left">
                        <img src="img/imgPlay.png" alt="" width="90%">
                    </div>
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
            <figure class="B2" style="grid-area:B2 ;">
                <div class="cont-rigth">
                    <img class="imgXboxConsole" src="img/imgPs5Right.PNG" alt="" width="80%">
                </div>
                <div class="overlay"></div>
            </figure>
            <figure class="C1" style="grid-area:C1 ;">
                <div class="cont-left">
                    <div class="img-left">
                        <img src="img/imgnin.PNG" alt="" width="80%">
                    </div>
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
            </figure>
            <figure class="C2" style="grid-area:C2 ;">
                <div class="cont-rigth">
                    <img class="imgXboxConsole" src="img/imgninRight.PNG" alt="" width="90%">
                </div>
            </figure>
        </section>
        <section class="container-cards">
            <div>

            </div>
        </section>
        <main class="container-principal">
            <header>
                <figure>
                    <img src="img/imagenesMain/mm (1).jpg" alt="" width="100%">
                    <div class="text-img-banner">
                        <span>Marvel’s Spider-Man: Miles Morales
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
                    Tendencias
                </span>
            </div>
            <section class="container-juegos">

                <div class="j1" style="grid-area: j1;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (1).png" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            Grand Theft Auto 5
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>
                <div class="j1" style="grid-area: j2;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (2).png" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            Dark souls | Remastered
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>
                <div class="j1" style="grid-area: j3;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (3).png" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            Call of Dutty Modern Warfare III
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>
                <div class="j1" style="grid-area: j4;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (4).jpg" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            Red Dead Redemption II
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>
                <div class="j1" style="grid-area: j5;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (5).jpg" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            Ghost of Tsushima
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>
                <div class="j1" style="grid-area: j6;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (6).jpg" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            EA Sports F1 24 (Xbox One / Xbox Series XS)
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>
                <div class="j1" style="grid-area: j7;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (7).jpg" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            South Park: Snow Day! Digital Deluxe Edition
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>
                <div class="j1" style="grid-area: j8;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (8).jpg" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            Ready or Not
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>
                <div class="j1" style="grid-area: j9;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (9).jpg" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            The Outlast Trials Deluxe Edition
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>

            </section>
            <div class="span">
                <span>
                    Las ofertas de la semana
                </span>
            </div>
            <section class="container-juegos2">

                <div class="j1" style="grid-area: j1;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (10).jpg" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            God of War
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>
                <div class="j1" style="grid-area: j2;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (11).jpg" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            Hitman World of Assassination
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>
                <div class="j1" style="grid-area: j3;">
                    <div class="img-card">
                        <img src="img/imagenesMain/imgCards/image (12).jpg" alt="">
                    </div>
                    <div class="text-card">
                        <span class="tittle-card">
                            Hodwarts Legacy
                        </span>
                        <span class="price-card">
                            $200.000
                        </span>
                    </div>
                </div>

            </section>
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
                        <img src="img/Footer/Captura de pantalla 2024-08-20 010228.png" alt="" width="30%">
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