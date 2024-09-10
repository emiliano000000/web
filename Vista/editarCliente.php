<?php
include '../Modelo/listarcli.php';

$cliente = new Cliente();
$id = isset($_GET['id']) ? $_GET['id'] : 0;

if ($id) {
    $con = $cliente->conectarBD();
    $stmt = $con->prepare("SELECT * FROM cliente WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $a_paterno = $row['A_paterno'];
        $a_materno = $row['A_materno'];
        $telefono = $row['telefono'];
        $correo = $row['correo'];
        $codigo_postal = $row['codigo_postal'];
        $password = $row['password'];
    } else {
        die("Cliente no encontrado.");
    }
} else {
    die("ID de cliente no proporcionado.");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="css/estilos.css"><body>

    
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
    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="../Controlador/CtrlListar.php?opcion=4" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
            
            <label for="a_paterno">Apellido Paterno:</label>
            <input type="text" id="a_paterno" name="a_paterno" value="<?php echo htmlspecialchars($a_paterno); ?>" required>
            
            <label for="a_materno">Apellido Materno:</label>
            <input type="text" id="a_materno" name="a_materno" value="<?php echo htmlspecialchars($a_materno); ?>" required>
            
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>" required>
            
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
            
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" id="codigo_postal" name="codigo_postal" value="<?php echo htmlspecialchars($codigo_postal); ?>" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>" required>
            
            <button type="submit" class="btn btn-submit">Actualizar Cliente</button>
        </form>
        <a href="../Vista/listarCli.php" class="btn btn-back">Volver al Listado</a>
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
