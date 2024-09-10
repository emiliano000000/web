<?php
// Incluye el archivo que contiene la clase CtrlLavadores
include "../Controlador/CtrlLavadores.php";

// Crea una instancia de CtrlLavadores
$ctrlLavadores = new CtrlLavadores();

// Llama al método ListarLavadores y guarda los resultados
$lavadores = $ctrlLavadores->ListarLavadores();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="css/estilos.css"><body>
    <link rel="stylesheet" href="index.html">
    
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
    <h1>Lista de Lavadores</h1>
    <a href="nuevoLavador.html" class="button button-add">Agregar Lavador</a>
    <?php if (count($lavadores) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Género</th>
                <th>Dirección</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>RFC</th>
                <th>Código Postal</th>
                <th>Apartamento</th>
                <th>Foto</th>
                <th>Foto INE1</th>
                <th>Foto INE2</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($lavadores as $lavador): ?>
                <tr>
                    <td><?php echo htmlspecialchars($lavador['id_lavador']); ?></td>
                    <td><?php echo htmlspecialchars($lavador['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($lavador['apellido_paterno']); ?></td>
                    <td><?php echo htmlspecialchars($lavador['apellido_materno']); ?></td>
                    <td><?php echo htmlspecialchars($lavador['genero']); ?></td>
                    <td><?php echo htmlspecialchars($lavador['direccion']); ?></td>
                    <td><?php echo htmlspecialchars($lavador['correo']); ?></td>
                    <td><?php echo htmlspecialchars($lavador['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($lavador['rfc']); ?></td>
                    <td><?php echo htmlspecialchars($lavador['codigo_postal']); ?></td>
                    <td><?php echo htmlspecialchars($lavador['Apartamento']); ?></td>
                    <td><img src="data:image/jpeg;base64,<?php echo $lavador['foto']; ?>" width="50"></td>
                    <td><img src="data:image/jpeg;base64,<?php echo $lavador['foto_ine1']; ?>" width="50"></td>
                    <td><img src="data:image/jpeg;base64,<?php echo $lavador['foto_ine2']; ?>" width="50"></td>
                    <td>
                        <a href="editarLavador.php?id=<?php echo $lavador['id_lavador']; ?>" class="button button-edit">Editar</a>
                        <a href="eliminarLavador.php?id=<?php echo $lavador['id_lavador']; ?>" class="button button-delete">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No hay lavadores registrados.</p>
    <?php endif; ?>
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
