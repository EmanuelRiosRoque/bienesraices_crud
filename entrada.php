<?php
require 'includes/funciones.php'; 
incluirTemplate('header');
?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>


        <picture>
            <source srcset="/build/img/destacada2.webp" type="imagen/webp">
            <source srcset="/build/img/destacada2.jpg" type="imagen/jpeg">
            <img src="/build/img/destacada2.jpg" alt="Imagen Propiedad" loading="lazy">
        </picture>

        <p class="inf-meta">Escrito el: <span> 16/01/23</span>  por: <span> Admin</span></p>

        <div class="resumen-propiedad">
        

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore ipsa, reprehenderit aut a perferendis minus voluptate molestias minima et autem est dolorum, ipsam facere. Hic expedita odit dolore reprehenderit velit? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente, placeat vitae animi similique incidunt harum ex modi pariatur nesciunt ullam quia delectus excepturi, cum repellendus suscipit porro, consequuntur ut totam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem hic minima quod commodi tempora omnis in quis amet id quisquam neque fugiat, reprehenderit distinctio aperiam quam maiores sit a adipisci!</p>
            
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo placeat debitis nam omnis deserunt sit, aperiam, ex ipsam facere odio beatae assumenda voluptatem, quasi ullam architecto. Voluptate repudiandae laboriosam nemo?</p>
        </div>
    </main>

<?php
incluirTemplate('footer');
?>