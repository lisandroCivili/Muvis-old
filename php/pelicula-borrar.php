<?php
session_start();
if(!empty($_SESSION['usuario']) && $_SESSION['tipo'] == 'Administrador'){
    $ruta = '../css';
    require_once("../html/encabezado.html");
    require("conexion.php");
?>
<section class="sectionBorrar">
<?php
require("menu.php");
?>
<main class="mainBorrar">
    <article class="articleBorrar">
    <?php
    $conexion = conectar();
    if($conexion && !empty($_GET['id'])){
        $id = $_GET['id'];
    }
    $consulta = 'SELECT * FROM pelicula WHERE id = '.$id;
    $resultadoCons = mysqli_query($conexion, $consulta); 
    if($resultadoCons)  {
        if(mysqli_num_rows($resultadoCons)){
            $fila = mysqli_fetch_array($resultadoCons);
        }
    }

    echo '<h2 class="h2Borrar" >Eliminar pelicula</h2>';
    echo '<p class="pBorrar" >¿Esta seguro que desea eliminar <strong>'.$fila['titulo'].'</strong>?</p>';
    echo '<div class="divBorrar">';
    echo '<a class="botonBorrar" href="borrar-confirmar.php?id='.$id.'"><button>Confirmar</button></a>';
    echo '<a class="botonBorrar" href="pelicula-listado.php"><button>Cancelar</button></a>';
    echo '</div>';
    desconectar($conexion);
    ?>
    </article>
  </main>
</section>
<?php
}else{
    header("Location:../index.php");
}

?>