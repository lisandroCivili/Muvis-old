<?php
session_start();
if(!empty($_SESSION['usuario'])){
    require_once("conexion.php");

    if(!empty($_POST['titulo']) && !empty($_POST['duracion']) && !empty($_POST['genero']) && !empty($_POST['fechEstreno']) 
    && !empty($_FILES['foto']['size'])){


    $titulos = $_POST['titulo'];
    $duracion = $_POST['duracion'];
    $genero = $_POST['genero'];
    $fechEstreno = $_POST['fechEstreno'];

    $extension = explode('.', $_FILES['foto']['name']);
    $rutaOrigen = $_FILES['foto']['tmp_name'];
    $rutaDestino = '../img/portadas/'.$extension[0].'.'.$extension[1];
    $carga = move_uploaded_file($rutaOrigen, $rutaDestino);

    $conexion = conectar();
    $consulta = 'INSERT INTO pelicula(titulo, duracion, genero, fecha_estreno, foto_portada)
                VALUES (\''. $titulos .'\', \''. $duracion .'\', \''. $genero .'\', \''. $fechEstreno .'\', \''. $extension[0] .'.jpg\')';
    $q = mysqli_query($conexion, $consulta);
    if ($q){
        $resultado = 'Pelicula cargada correctamente♥';
        echo $resultado;
    }else{
        $resultado = 'No se pudo cargar la pelicula, intentelo de nuevo';
        echo $resultado;
    }
    desconectar($conexion);
    }else{
        $resultado = 'Faltan datos, complete todos los campos por favor.';
        echo $resultado;
    }

}else{
    header("Location:../index.php");
}
?>