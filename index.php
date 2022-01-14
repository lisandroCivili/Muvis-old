<?php
    $ruta = 'css';
    require_once("html/encabezado.html");
?>
<main id="mainIndex">
    <article id="articleIndex">
        <legend id="legendIndex">Inicie Sesión</legend>
        <fieldset id="formuIndex">
            <form action="php/procesar.php" method="post">
            <label for="usu">Usuario:
            <input type="text" id="usu" name="usuario" placeholder="Usuario">
            </label>
            <label for="pass">Contraseña:
            <input type="password" id="pass" name="contra" placeholder="Contraseña" >
            </label>
            <fieldset id="boton">
            <input class="boton" type="submit" value="Iniciar sesión">
            </fieldset>
            </form>
        </fieldset>
        
    </article>
</main>

<?php
    require_once("html/pie.html");
?>