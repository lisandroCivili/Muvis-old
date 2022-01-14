<?php
session_start();
if(!empty($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    $id = $_GET['id'];
    $tiempo = time() + 60 * 24 * 60 * 60;
    if(empty($_COOKIE[$usuario]) && isset($_COOKIE[$usuario])) {
        setcookie($usuario, $id, $tiempo, '/');
        echo '<p>Agregada a favoritos</p>';
        header('refresh:3; url=pelicula_listado.php');
    }else{
        $arregloCookie = explode(',', $_COOKIE[$usuario]);
        if (!in_array($id, $arregloCookie)) { 
            $arregloCookie[] = $id;
        }
        $lineaCookie = implode(',', $arregloCookie);
        setcookie($usuario, $lineaCookie, $tiempo, '/');
        echo '<p>Agregada a favoritos</p>';
        header('refresh:3; url=peliculas-fav-listado.php');
    }

require_once("../html/pie.html");
}else{
    header("Location:../index.php");
}
?>