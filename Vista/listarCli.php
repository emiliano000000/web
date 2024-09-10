<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos lavador</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

</head>
<body>
      <header class="header">
        <nav class="navbar container">
            <div class="navbar__logo">
                <img src="img/Logo.jpeg" alt="Logo Brillante">
                <h2 class="navbar__title"></h2>
            </div>
            <div class="search-container">
                <form id="searchForm" action="/buscar" method="GET">
                    <input type="text" name="query" id="searchInput" placeholder="Buscar..." class="search-input">
                    <button type="submit" class="search-button">Buscar</button>
                </form>
            </div>
            <ul class="navbar__links navbar__links--menu">
                <li class="nav__items">
                    <a href="index.html" class="nav__links">Inicio</a>
                </li>
                <li class="nav__items">
                    <a href="index.html#servicio" class="nav__links">Servicios</a>
                </li>
                <li class="nav__items">
                    <a href="index.html#nosotros" class="nav__links">Antecedentes</a>
                </li>
                <li class="nav__items">
                    <a href="index.html#personal" class="nav__links">Cerca de ti</a>
                </li>
                <li class="nav__items">
                    <a href="index.html#mvo" class="nav__links">M-V-O</a>
                </li>
                <li class="nav__items">
                    <a href="IniciarSesion.html" class="nav__links">Iniciar Sesión</a>
                </li>
                <img src="img/close.svg" class="navbar__close" alt="">
            </ul>
            <div class="navbar__menu">
                <img src="img/menu.svg" class="navbar__icon" alt="">
            </div>
        </nav>
    </header>   
<body>
    <div id="agrupar">
        <header id="cabecera">
            <h1>Listado de Clientes</h1>
        </header>
        <section id="seccion">
            <?php
            include '../Controlador/CtrlListar.php';
            ?>
        </section>
    </div>
</body>
<footer class="footer" id="footerid">
        <section class="footer__container container">
            <nav class="nav nav--footer">
                <h2 class="footer__title">CarWash Movil</h2>
                <ul>
                    <li>
                        <p>Dirección</p>
                        Manuel caballero 131, Col. La obrera, casi equina 5 de febrero, Cuidad de Mexico 06800
                    </li>
                    <li>Martinez Garcia Fernando</li>
                    <li>
                        <p>Teléfono</p>
                        52+ 55 6808-1606
                    </li>
                    <li>
                        <p>Email</p>
                        publicidad131@gmail.com
                    </li>
                </ul>
            </nav>
    
            <div class="information">
                <p class="title-footer">Información</p>
                <ul>
                    <li><a href="#">Acerca de Nosotros</a></li>
                    <li><a href="#">Políticas de Privacidad</a></li>
                    <li><a href="#">Términos y condiciones</a></li>
                    <li><a href="#Contacto">Contáctanos</a></li>
                </ul>
            </div>
    
            <form class="footer__form" action="#" method="POST">
                <h2 class="footer__newsletter">Comunicate Con Nosotros</h2>
                <div class="footer__inputs">
                    <input type="text" placeholder="Comentario:" class="footer__input" name="_replyto">
                    <input type="submit" value="Enviar" class="footer__submit">
                </div>
            </form>
        </section>
    
        <section class="footer__copy container">
            <div class="footer__social">
                <a href="https://www.facebook.com/share/UNwMHmu1zvN31cZS/" class="footer__icons"><img src="img/bxl-facebook.svg" class="footer__img"></a>
                <a href="https://www.instagram.com/diamondwashservices?utm_source=qr&igsh=MXQ0dnB1ZDUxZDl1bg==" class="footer__icons"><img src="img/bxl-instagram.svg" class="footer__img"></a>
                <a href="https://mx.linkedin.com" class="footer__icons"><img src="img/bxl-linkedin.svg" class="footer__img"></a>
            </div>
    
            <h3 class="footer__copyright">Derechos reservados &copy; DIG+</h3>
            <br>
            <img src="img/payment.png" alt="Pagos">
        </section>
    </footer>
    <script src="./js/slider.js"></script>
    <script src="./js/questions.js"></script>
    <script src="./js/menu.js"></script>
</body>

</html>

