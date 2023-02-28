<?php
require 'includes/funciones.php'; 
incluirTemplate('header');
?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Contacto</h1>

        <picture>
            <source srcset="/build/img/destacada3.webp" type="image/webp">
            <source srcset="/build/img/destacada3.jpg" type="image/jpeg">
            <img src="/build/img/destacada3.jpg" alt="Imagen Contacto" loading="lazy">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario" action="">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" placeholder="Tu Nombre">

                <label for="email">E-mail</label>
                <input type="email" id="email" placeholder="Tu Correo">

                <label for="telefono">Telefono</label>
                <input type="tel" id="telefono" placeholder="Tu Telefono">
            
                <label for="mensaje">Mensaje:</label>
                <textarea name="" id="mensaje" cols="30" rows="10"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Sobre La Propiedad</legend>
                <label for="opciones">Vende o compra:</label>

                <select name="" id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Venta">Venta</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" id="presupuesto" placeholder="Tu Precio o Presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>¿Comó desea ser contactado?</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="cotactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="cotactar-email">
                </div>

                <p>Si eligio telefono, eliga la fecha y hora para ser contactado</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>


            <input class="btn-verde" type="submit" value="Enviar">
        </form>
    </main>

<?php
incluirTemplate('footer');
?>