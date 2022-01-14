<?php
session_start();
if(!empty($_SESSION['usuario']) && $_SESSION['tipo'] == 'Administrador'){
$ruta = '../css';
require_once("../html/encabezado.html");
echo '<section id="sectionAlta">';
require("menu.php");
?>
<main>
    <article id="articleAlta">
        <legend id="legendAlta">Nueva Pelicula:</legend>
        <form id="formuAlta" action="cargar-datos.php" method="POST" enctype="multipart/form-data"> 
            <label for="titulo">Titulo:
                <input type="text" id="titulo" name="titulo" placeholder="Ingrese el Titulo">
            </label>
            <label for="duracion">Duracion:
                <input type="text" id="duracion" name="duracion" placeholder="Ingrese la Duracion">
            </label>
            <label for="genero">Genero:
                <select name="genero" id="genero">
                <option value="Accion">Accion</option>
                <option value="Comedia">Comedia</option>
                <option value="Terror">Terror</option>
                </select>
            </label>
            <label for="fechEstreno">Fecha Estreno:
                <input type="date" id="fechEstreno" name="fechEstreno" placeholder="Ingrese la Fecha de Estreno">
            </label>

            <label for="foto">Foto de Portada:
                <input type="file" name="foto" accept="image/*" id="foto">
            </label>
            <fieldset id="botonAlta">
                <input class="botones" type="submit" value="Agregar pelicula">
            </fieldset>
                
    </form>
    </article>
    
</main>
<?php 
require_once("../html/pie.html");
}else{
    header("Location:../index.php");
}
?>