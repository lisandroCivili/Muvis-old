<?php
session_start();

if(!empty($_SESSION['usuario'])){
    $ruta = '../css';
require("conexion.php");
require_once("../html/encabezado.html");
?>
<section class="sectionFavoritas">
    <?php
    require("menu.php");
    ?>
    <main class="mainFavoritas">
        <?php
            if(!empty($_COOKIE[$_SESSION['usuario']]) && isset($_COOKIE[$_SESSION['usuario']])) {
            
            $conexion = conectar();
            $prefe = explode(',', $_COOKIE[$_SESSION['usuario']]);
            $consulta = 'SELECT * FROM pelicula WHERE ';
            foreach ($prefe as $clave => $valor){
                $consulta .= 'id=\'' . $valor .'\' OR ';
            }
            $consulta = rtrim($consulta, 'OR ');
            $resultado = mysqli_query($conexion, $consulta);
            $numFilas = mysqli_num_rows($resultado);
            desconectar($conexion);
            if($numFilas > 0){
                while($fila = mysqli_fetch_array($resultado)){
                    if (empty($fila['foto_portada'])) {
                        $fila['foto_portada'] = '../sin_imagen.png';
                    }
                echo '<article id="articleListado">';
                echo '<figure id="figurePortada">';
                echo '<img id = "imgPortada" src="../img/portadas/'.$fila['foto_portada'].'" alt="Portada de pelicula">';
                echo '</figure>';
                echo '<div id="datosListado">';
                echo '<p class="pListado"><strong>Titutlo: </strong>' .$fila['titulo'].'</p>';
                echo '<p class="pListado"><strong>Genero:</strong> '.$fila['genero'].'<p>';
                echo '<p class="pListado"><strong>Fecha de estreno:</strong> '.$fila['fecha_estreno'].'</p>';
                echo '<p class="pListado"><strong>Duracion:</strong> '.$fila['duracion'].'</p>';
                echo '<ul id="menuIconos"><li><a href="pelicula-modificar.php?id=' .$fila['id'] . '"><img src="../img/edit_pencil.png"</a></li>';
                echo '<li><a href="pelicula-borrar.php?id=' . $fila['id'] . '"><img src="../img/trash_empty.png"></a></li>';
                echo '<li><a href="pelicula-favorito-add.php?id=' . $fila['id'] . '"><img src="../img/estrella.png"></a></li></ul>';
                echo '</div>';
                echo '</article>';
                }
            }
        }else{

        }
        require_once("../html/pie.html");
    }else{
        header("Location:../index.php");
    }
        ?>
    </main>
</section>    


