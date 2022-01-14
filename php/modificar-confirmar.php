<?php
session_start();
if(!empty($_SESSION['usuario']) && $_SESSION['tipo'] == 'Administrador' || $_SESSION['tipo'] == 'Editor'){
$ruta = '../css';
require_once("../html/encabezado.html");
require("conexion.php");
?>
<section id="sectionModificar">
<?php
    require("menu.php");
?>
<main id="mainConfirmar">
    <article id="articleConfirmar">
        <p class="pConfirmar"><?php
            $conexion = conectar();
            if(isset($_POST['modificar'])){
                
                if($conexion && !empty($_POST['id'])){
                    $id = $_POST['id'];
                    $consulta = 'UPDATE pelicula SET titulo = \''.$_POST['titulo'].'\', 
                    duracion = '.$_POST['duracion'].', genero = \''.$_POST['genero'].'\', 
                    fecha_estreno = \''.$_POST['fecha_estreno'].'\' WHERE id = '.$id;
                    $carga = mysqli_query($conexion, $consulta);
                    if($carga){
                        echo '<p class="pConfirmar">Cambios guardados con exito!</p>';
                    }else{
                        echo '<p class="pConfirmar">No se pudieron guardar los cambios, intentelo de nuevo<p>';
                        header('refresh:3; url=pelicula-modificar.php');
                    }
                }else{
                    echo '<p class="pConfirmar">Faltan datos, complete los campos.</p>';
                }
            }elseif(isset($_POST['cancelar'])){
                echo '<p class="pConfirmar">Modificacion cancelada.</p>';
                //header('refresh:3; url=pelicula-listado.php');
            }
            desconectar($conexion);
        ?></p>
    </article>
</main>
</section>
<?php
require_once("../html/pie.html");
}else{
    header("Location:../index.php");
}
?>
