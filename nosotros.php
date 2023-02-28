<?php
require 'includes/funciones.php'; 
incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Nosotros</h1>

        <div class="contenido-nosotros">
            <picture>
                <source src="/build/img/nosotros.webp" type="Imagen Nosotros Webp">
                <source src="/build/img/nosotros.jpg" type="Imagen Nosotros Webp">
                <img src="/build/img/nosotros.jpg" alt="Imagene Nosotros" loading="lazy">
            </picture>

            <div class="texto-nosotros">
                <p class="txt-nosotros-bold">25 Años de Experiencia</p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut minima assumenda maxime, non quae soluta rem reiciendis hic mollitia ratione sit corporis doloribus voluptatem iure iusto aliquid tenetur repudiandae in.
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui mollitia deleniti ea reprehenderit, harum ullam dolores distinctio cum aspernatur sunt consequuntur beatae illum a cumque repellendus vero soluta ratione ipsa.
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
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
    </section> <!--End Main-->


<?php
incluirTemplate('footer');
?>