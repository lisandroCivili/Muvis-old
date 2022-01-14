<?php
session_start();
if(!empty($_SESSION['usuario'])){
$ruta = '../css';
require_once("../html/encabezado.html");

?>
<section id="sectionListado">
<?php
require("menu.php");
?>
<main id="mainListado">
    <?php
        require("conexion.php");
        $consulta = 'SELECT * FROM pelicula';
        $conexion = conectar();
        $q = mysqli_query($conexion, $consulta);
        $resultado = mysqli_num_rows($q);
        if($resultado){
            while($fila = mysqli_fetch_array($q)){
                if (empty($fila['foto_portada'])) {
                    $fila['foto_portada'] = '../sin_imagen.png';
                }
                echo '<article id="articleListado">';
                echo '<figure id="figurePortada">';
                echo '<img id = "imgPortada" src="../img/portadas/'.$fila['foto_portada'].'" alt="Portada de pelicula">';
                echo '</figure>';
                echo '<div id="datosListado">';
                echo '<p class="pListado"><strong>Titulo: </strong>' .$fila['titulo'].'</p>';
                echo '<p class="pListado"><strong>Genero:</strong> '.$fila['genero'].'<p>';
                echo '<p class="pListado"><strong>Fecha de estreno:</strong> '.$fila['fecha_estreno'].'</p>';
                echo '<p class="pListado"><strong>Duracion:</strong> '.$fila['duracion'].'</p>';
                echo '<ul id="menuIconos">';
                if($_SESSION['tipo'] == 'Administrador' || $_SESSION['tipo'] == 'Editor'){
                    echo '<li><a href="pelicula-modificar.php?id=' .$fila['id'] . '"><img src="../img/edit_pencil.png"</a></li>';
                }
                if($_SESSION['tipo'] == 'Administrador'){
                    echo '<li><a href="pelicula-borrar.php?id=' . $fila['id'] . '"><img src="../img/trash_empty.png"></a></li>';
                }
                echo '<li><a href="pelicula-favorito-add.php?id=' . $fila['id'] . '"><img src="../img/estrella.png"></a></li></ul>';
                echo '</div>';
                echo '</article>';
            }       
        }else{
            echo '<p>NO se encontraron peliculas para ver.</p>';
        }
    desconectar($conexion) ;

    ?>
</main>
</section>
<?php 
require_once("../html/pie.html");
}else{
    header("Location:../index.php");
}
?>
