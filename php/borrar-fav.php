<?php
session_start();
if(!empty($_SESSION['usuario'])){
$ruta = '../css';
require_once("../html/encabezado.html");
?>
<section id="sectionListado">
    <main id="mainListado">
<?php
    unset($_COOKIE[$_SESSION['usuario']]);
    setcookie($_SESSION['usuario'], '', time()-3600, '/');
    echo '<p>Borrado exitoso!</p>';
    header('refresh:2; url=pelicula-listado.php');
}else{
    header("Location:../index.php");
}
?>
    </main>
</section>