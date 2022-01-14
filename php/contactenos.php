<?php
    session_start();
    if(!empty($_SESSION['usuario'])){
        $ruta = '../css';
        require_once("../html/encabezado.html");
        require("conexion.php");
    ?>
    <section class="sectionContactenos">
    <?php
    require("menu.php");
    ?>
    <main class="mainContactenos">
        <article class="articleContactenos">
            <legend class="legendContactenos">Contáctenos</legend>
            <form class="formContactenos" action="enviar-correo.php" method="post">
                <label for="motivo">Motivo
                    <select name="motivo" id="motivo">
                        <option value="Sugerencia">Sugerencia</option>
                        <option value="Reclamo">Reclamo</option>
                    </select>
                </label>
                <label for="mensaje">Mensaje
                    <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
                </label>
            <fieldset class="botonContactenos">
                <input class="boton" type="submit" value="Enviar">
            </fieldset>
            </form>
        </article>
    </main>    
</section>
<?php 
require_once("../html/pie.html");
}else{
    header("Location:../index.php");
}
?>