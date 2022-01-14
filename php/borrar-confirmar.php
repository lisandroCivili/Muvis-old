<?php
session_start();
if(!empty($_SESSION['usuario']) && $_SESSION['tipo'] == 'Administrador'){
    require_once("../html/encabezado.html");
    require_once("menu.php");
    require("conexion.php");
    $id = $_GET['id'];
    $conexion = conectar();
    $consulta = 'DELETE FROM pelicula WHERE id = '.$id;
    $resultadoCons = mysqli_query($conexion, $consulta); 
    if($resultadoCons){
        $resultado = '<p><strong>Se elimino exitosamente.</strong></p>';
        echo $resultado;
        header('refresh:3; url=pelicula-listado.php');
    }else{
        $resultado = '<p><strong>No se pudo eliminar, intentelo nuevamente.</strong></p>';
        echo $resultado;
        header('refresh:3; url=pelicula-borrar.php');
    }
}else{
    header("Location:../index.php");
}
?>