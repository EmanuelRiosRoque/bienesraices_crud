<?php
require 'includes/funciones.php'; 
incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="/build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse pariatur sequi voluptates minus quidem quam culpa ut cum ratione.</p>
            </div>

            <div class="icono">
                <img src="/build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse pariatur sequi voluptates minus quidem quam culpa ut cum ratione.</p>
            </div>

            <div class="icono">
                <img src="/build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse pariatur sequi voluptates minus quidem quam culpa ut cum ratione.</p>
            </div>
        </div> <!--.iconos nosotros-->
    </main> <!--End Main-->


    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>
        
        <?php 
            $limite = 3;
            include 'includes/templates/anuncios.php'
        ?>

        <div class="alinear-derecha">
            <a class="btn-verde" href="/anuncios.php">Ver Todas</a>
        </div>
    </section> <!--End Anuncios-->


    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contifo a la brevedad</p>
        <a class="btn-amarillo" href="/contacto.php">Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/build/img/blog1.webp" type="image/webp"> 
                        <source srcset="/build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog"> 
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="inf-meta">Escrito en: <span>13/01/2023</span> por: <span>Admin</span></p>

                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores precios</p>
                    </a>
                </div>
            </article> <!--End Entrada Blog-->

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/build/img/blog2.webp" type="image/webp"> 
                        <source srcset="/build/img/blog3.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog3.jpg" alt="Texto entrada blog"> 
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu Hogar</h4>
                        <p class="inf-meta">Escrito en: <span>13/01/2023</span> por: <span>Admin</span></p>

                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article> <!--End Entrada Blog-->            
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas
                </blockquote>
                <p>- Emanuel Rios</p>
            </div>
        </section>
    </div>

<?php
incluirTemplate('footer');
?>