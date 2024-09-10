<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarWash Movil</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <header class="hero">
        <nav class="nav container">
            <div class="nav__logo">
                <img src="img/Logo.jpeg" alt="Logo">
                <h2 class="nav__title"></h2>
            </div>
    
            <div class="search-container">
                <form id="searchForm" action="/buscar" method="GET">
                    <input type="text" name="query" id="searchInput" placeholder="Buscar..." class="search-input">
                    <button type="submit" class="boton-busq">Buscar</button>
                </form>
            </div>
    
            <ul class="nav__link nav__link--menu">
                <li class="nav__items">
                    <a href="index.html" class="nav__links">Inicio</a>
                </li>
                <li class="nav__items">
                    <a href="#servicio" class="nav__links">Servicios</a>
                </li>
                <li class="nav__items">
                    <a href="#nosotros" class="nav__links">Antecedentes</a>
                </li>
                <li class="nav__items">
                    <a href="#personal" class="nav__links">Cerca de ti</a>
                </li>
                <li class="nav__items">
                    <a href="#mvo" class="nav__links">M-V-O</a>
                </li>
                <li class="nav__items">
                    <a href="IniciarSesion.html" class="nav__links">Iniciar Sesión</a>
                </li>
                <li class="nav__items">
                    <a href="#" class="nav__links" id="user-icon-link">
                        <img src="img/bxs-user.svg" alt="Usuario" class="nav__user-icon">
                    </a>
                </li>
                <img src="img/close.svg" class="nav__close" alt="">
            </ul>
    
            <div class="nav__menu">
                <img src="img/menu.svg" class="nav__img" alt="">
            </div>
        </nav>
    
        <section class="hero__container container">
            <h1 class="hero__title">CarWash Movil</h1>
            <p class="hero__paragraph">"Tu auto merece el mejor brillo, nosotros se lo damos."</p>
            <a href="IniciarSesion.html" class="cta">Comienza ahora</a>
        </section>
    </header>

    <?php
            if (isset($_GET["message"])) {
                $message = $_GET["message"];
                echo '<div class="mensaje">' . $message . '</div>';
            }
            ?>


    
    <main>
        <section class="container about" id="servicio">
            <h2 class="subtitle">Servicios de Lavado</h2>
            <p class="about__paragraph">El lavado regular del coche es crucial para mantener su apariencia y 
                funcionamiento en óptimas condiciones. <br>
                El Autolavado DiamondWash, ofrecemos una variedad de servicios para asegurarnos de que tu coche se vea y funcione como nuevo.</p>

            <div class="about__main">
                <article class="about__icons">
                    <img src="img/bxs-car-wash.svg" class="about__icon">
                    <h3 class="about__title">Lavado Exterior</h3>
                    <p class="about__paragrah">Nuestro servicio de lavado exterior incluye un lavado a fondo de la carrocería, llantas y ventanas.
                        Utilizamos productos de alta calidad y técnicas avanzadas para eliminar la suciedad, el polvo y otros contaminantes que pueden
                        dañar la pintura de tu coche. ¡Haz que tu coche brille como nunca antes!</p>
                </article>

                <article class="about__icons">
                    <img src="img/bxs-washer.svg" class="about__icon">
                    <h3 class="about__title">Lavado Interior</h3>
                    <p class="about__paragrah">El interior de tu coche también merece estar impecable. Nuestro lavado interior abarca la limpieza de asientos,
                        alfombras, tapetes, tablero y todas las superficies internas. Nos aseguramos de quitar el polvo, las manchas y los malos olores para que
                        disfrutes de un ambiente fresco y limpio cada vez que conduzcas.</p>
                </article>

                <article class="about__icons">
                    <img src="img/bxs-car-mechanic.svg" class="about__icon">
                    <h3 class="about__title">Lavado de Motor</h3>
                    <p class="about__paragrah">Mantener el motor de tu coche limpio es fundamental para su buen rendimiento. Nuestro servicio de lavado de motor
                        incluye una limpieza cuidadosa y meticulosa para eliminar la grasa, el aceite y la suciedad acumulada. Utilizamos métodos seguros para
                        garantizar que todas las partes del motor queden limpias sin riesgo de daños.</p>
                </article>
            </div>
        </section>

        <section class="knowledge">
            <div class="knowledge__container container" id="nosotros">
                <div class="knowledege__texts">
                    <h2 class="subtitle">Antecedentes</h2>
                    <p class="knowledge__paragraph"> </p> <br>
                    <p>El carwash a domicilio ha crecido por la demanda de conveniencia y servicios personalizados. Surgió para ahorrar tiempo a los
                        propietarios de vehículos, llevándoles el servicio directamente a su ubicación.</p>
                        <br>
                     <p>Factores Clave:
                        <br>
                        Innovación Tecnológica: Equipos portátiles y aplicaciones móviles han mejorado la eficiencia y accesibilidad.
                        Preferencias del Consumidor: Valoración de conveniencia, ahorro de tiempo y métodos ecológicos.</p>
                        <br>
                 <p>Ventajas:
                    <br>
                    Servicio a domicilio elimina la necesidad de desplazamientos.
                    Adaptación a necesidades específicas del cliente.
                    Horarios flexibles y ahorro de tiempo para los clientes.</p>
                    <br>
                    <p>Desafíos:
                        <br>
                        Coordinación logística.
                        Mantener calidad uniforme.
                        Cumplir con normativas locales.</p>
                        <br>
                        <p>Ejemplos de Éxito:
                            <br>
                            Empresas como Spiffy y Washos han crecido usando tecnología y enfoque en el cliente.
                            El carwash a domicilio es una evolución importante en la industria, con gran potencial de crecimiento continuo.</p>
                </p>
                </div>

                <figure class="knowledge__picture">
                    <img src="img/Logo.jpeg" class="knowledge__img">
                </figure>
            </div>
        </section>

        <section class="price container" id="personal">
            <h2 class="subtitle">Cerca de ti (Nezahualcóyotl).</h2>
        
            <div class="price__table">
                <div class="price__element">
                    <p class="price__name">Limpiador</p>
                    <div class="price__items">
                        <img src="img/LAVADOR1.jpeg" alt="Descripción de la imagen" class="price__features">
                        <h3 class="price__price">Miguel Martinez Gomez</h3>

                    </div>
                    <a href="Lavador1.html" class="price__cta">Ver más</a>
                </div>
        
                <div class="price__element ">
                    <p class="price__name">Limpiador</p>
                    <div class="price__items">
                        <img src="img/LAVADOR2.jpeg" alt="Descripción de la imagen" class="price__features">
                        <h3 class="price__price">Carlos Tellez Lopez</h3>
                    </div>
                    <a href="Lavador2.html" class="price__cta">Ver más</a>

                </div>
        
                <div class="price__element ">
                    <p class="price__name">Limpiador</p>
                    <div class="price__items">
                        <img src="img/LAVADOR3.jpeg" alt="Descripción de la imagen" class="price__features">
                        <h3 class="price__price">Juan García Lopez</h3>

                    </div>
                    <a href="Lavador3.html" class="price__cta">Ver más</a>
                </div>
        
                <div class="price__element">
                    <p class="price__name">Limpiador</p>
                    <div class="price__items">
                        <img src="img/LAVADOR4.jpeg" alt="Descripción de la imagen" class="price__features">
                        <h3 class="price__price">Luiz Sanchez Rodriguez</h3>

                    </div>
                    <a href="Lavador4.html" class="price__cta">Ver más</a>
                </div>
            </div>
        </section>
        

        <section class="testimony">
            <div class="testimony__container container">
                <img src="img/leftarrow.svg" class="testimony__arrow" id="before">

                <section class="testimony__body testimony__body--show" data-id="1">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Miguel Martinez Gomez <span class="testimony__course"> </span></h2>
                        <p class="testimony__review">Comencé a trabajar como lavador de autos a domicilio en 2011.
                            Desde el primer día, me enfoqué en brindar un servicio excepcional y cuidadoso, lo que me llevó a destacarme y ser reconocido como
                            un referente en atención al cliente. En 2013, fui ascendido a supervisor gracias a mi dedicación y habilidades.
                        <br>
                        A lo largo de los años, he estado comprometido con la mejora continua. En 2015, introduje nuevas técnicas de limpieza y optimización
                        de procesos para garantizar resultados óptimos para nuestros clientes. Ahora, en 2024, con la expansión de nuestro servicio a domicilio,
                        mi objetivo sigue siendo el mismo: ofrecer servicios innovadores y de alta calidad que contribuyan al éxito y la reputación de Autolavado
                        CarWash Móvil.
                        </p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="img/LAVADOR1.jpeg" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="2">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Carlos Fernandez Lopez <span class="testimony__course"></span></h2>
                        <p class="testimony__review">Comencé a trabajar como lavador de autos a domicilio en 2012. Mi pasión por los automóviles y mi dedicación
                            al trabajo me llevaron a ascender como gerente del autolavado en 2015.
                        <br>
                        Durante mi tiempo aquí, he desarrollado programas de capacitación para el personal y mejorado la eficiencia operativa del autolavado.
                        Con la expansión en 2024, estoy emocionado de seguir implementando técnicas de limpieza sostenibles y avanzadas, manteniendo nuestro
                        compromiso con la calidad y la satisfacción del cliente.
                    </p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="img/LAVADOR2.jpeg" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="3">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Juan García Lopez <span class="testimony__course"></span></h2>
                        <p class="testimony__review">Mi carrera como lavador de autos a domicilio comenzó cuando me uní a Autolavado DiamondWash en 2013.
                            Mi habilidad para optimizar procesos y mi excelente trato con los clientes me hicieron destacar rápidamente, llevándome a asumir
                            la gestión del autolavado en 2015. Con la expansión en 2024, he trabajado en implementar nuevas tecnologías de limpieza y estrategias
                            de marketing. Estoy orgulloso de ser parte de un equipo que sigue ofreciendo servicios de primera y ganándose la confianza y el cariño
                            de la comunidad automotriz.</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="img/LAVADOR3.jpeg" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="3">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Luiz Alberto Sanchez Rodriguez <span class="testimony__course"></span></h2>
                        <p class="testimony__review">Desde 2015 formo parte del equipo de Autolavado DiamondWash. Desde mis inicios, me he enfocado en ofrecer
                            un servicio excepcional a domicilio, destacándome por mi atención al detalle y compromiso con la satisfacción del cliente. En 2018,
                            fui ascendido a supervisor, donde implementé mejoras operativas para garantizar resultados óptimos.
                        <br>
                        Ahora, en 2024, sigo comprometido en ofrecer servicios de alta calidad y seguir mejorando día a día en Autolavado DiamondWash.
                    </p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="img/LAVADOR4.jpeg" class="testimony__img">
                    </figure>
                </section>

                <img src="img/rightarrow.svg" class="testimony__arrow" id="next">
            </div>
        </section>

        <section class="questions container" id="mvo">
            <h2 class="subtitle">MISION  -  VISION  -  OBJETIVO</h2>


            <section class="questions__container">
                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">MISION
                            <span class="questions__arrow">
                                <img src="img/arrow.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show">Ofrecer servicios de lavado automotriz a domicilio de alta calidad que superen las expectativas de nuestros
                            clientes, utilizando tecnologías y productos ecoamigables para mantener la estética y la salud de los vehículos, contribuyendo así
                            a la preservación del medio ambiente.</p>
                    </div>
                </article>

                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">VISION
                            <span class="questions__arrow">
                                <img src="img/arrow.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show">Ser reconocidos como el servicio de autolavado a domicilio líder en nuestra región, distinguiéndonos por
                            la excelencia en el servicio al cliente, la innovación constante en nuestras técnicas de lavado y el compromiso con la
                            sostenibilidad ambiental.</p>
                    </div>
                </article>

                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">OBJETIVO
                            <span class="questions__arrow">
                                <img src="img/arrow.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show">Proporcionar un servicio de lavado a domicilio rápido y eficiente que permita a nuestros clientes
                            optimizar su tiempo y obtener resultados excepcionales. <br> <br>
              
                            Utilizar productos biodegradables y tecnologías ecoamigables para minimizar nuestro impacto ambiental y promover la
                            sostenibilidad. <br> <br>
              
                            Capacitar constantemente a nuestro equipo en técnicas de lavado y cuidado automotriz, asegurando la excelencia en cada
                            servicio que ofrecemos. <br> <br>
              
                            Implementar sistemas de gestión de calidad para garantizar la consistencia y mejora continua de nuestros procesos
                            y resultados. <br> <br>
              
                            Fomentar la satisfacción del cliente a través de una atención personalizada, escuchando sus necesidades y brindando
                            soluciones adaptadas a cada vehículo. <br> <br>
              
                            Diversificar nuestros servicios para ofrecer soluciones integrales de mantenimiento automotriz, incluyendo detailing,
                            protección de pintura, pulido y encerado, entre otros. <br> <br>
              
                            Establecer alianzas estratégicas con proveedores de renombre para garantizar la calidad y confiabilidad de los productos
                            utilizados en nuestro servicio de lavado a domicilio. <br> <br>
              
                            Contribuir activamente a la comunidad a través de programas de responsabilidad social empresarial, promoviendo la educación
                            ambiental y la participación en iniciativas de conservación del entorno.</p>
                    </div>
                </article>
            </section>
        </section>
    </main>

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
    <script src="js/msjUsuario.js"></script>
</body>

</html>