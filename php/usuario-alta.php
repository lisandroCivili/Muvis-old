<?php
session_start();
if(!empty($_SESSION['usuario'])){
    $ruta = '../css';
    require_once("../html/encabezado.html");
    require("conexion.php");
?>
<section class="sectionUsu">
<?php
require("menu.php");
?>
<main">
<article class="articleUsu">
  <legend id="legendUsu">Nuevo usuario</legend>
  <form id="nuevoUsu" action="usuario-alta-ok" method="POST" enctype="multipart/form-data">
    <label for="usu">Usuario:
        <input type="text" id="usu" name="usuario" placeholder="Ingrese un nombre de usuario">
    </label>
    <label for="contra">Contraseña:
        <input type="password" id="contra" name="contraseña" placeholder="Ingrese una contraseña">
    </label>
    <label for="mail">Mail:
        <input type="text" id="mail" name="email" placeholder="Ingrese su email">
    </label>
    <label for="date">Fecha de ingreso:
        <input type="date" id="date" name="fecha">
    </label>
    <label for="tipo">Tipo de usuario:
        <select name="tipo" id="tipo">
            <option value="Administrador">Administrador</option>
            <option value="Editor">Editor</option>
            <option value="Restringido">Restringido</option>
        </select>
    </label>
    <label for="fotoUsu">Seleccione  una foto de perfil:
        <input type="file" name="foto" accept="image/*" id="fotoUsu">
    </label>
    <fieldset id="botonUsu">
        <input id="botonUsuario" type="submit" value="Crear usuario">
    </fieldset>

  </form>
    </article>
    </main>
</section>
<?php
}else{
    header("Location:../index.php");
}
?>