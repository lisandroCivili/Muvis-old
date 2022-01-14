<?php

function conectar()
{
    
    $servidor = 'localhost';
    $usuario = 'root';
    $clave = '';
    $dbase = 'peliculas';
    $conexion = mysqli_connect($servidor, $usuario, $clave, $dbase);
    if(!$conexion){
        echo '<p>No se pudo conectar.</p>';
    }else{
        return $conexion;    
    }
}

function desconectar ($conexion)
{
    if($conexion) {
        $off = mysqli_close($conexion); 
        if(!$off){
            echo '<p>No se pudo desconectar.';
        }
    }else{
        echo '<p>No se pudo desconectar, no existe conexion.</p>';
    }
}

?>