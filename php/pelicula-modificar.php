<?php
    session_start();
    if(!empty($_SESSION['usuario']) && $_SESSION['tipo'] == 'Administrador' || $_SESSION['tipo'] == 'Editor'){
        $ruta = '../css';
        require_once("../html/encabezado.html");
        require("conexion.php");
    ?>
    <section id="sectionModificando">
    <?php
    require("menu.php");
    ?>
    <main id="mainModificando">
        <article id="articleModificando">
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
            ?>
     
    <form id="formuModificando" action="modificar-confirmar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
        <label for="title">Titulo:
            <input type="text" id="title" name="titulo" value="<?php echo $fila['titulo'] ?>">
        </label>
        <label for="dura">Duracion:
            <input type="number" id="dura" name="duracion" value="<?php echo $fila['duracion'] ?>">
        </label>
        <label for="genero">Genero:
            <select name="genero" id="genero">
            <option value="Accion">Accion</option>
            <option value="Comedia">Comedia</option>
            <option value="Terror">Terror</option>
            </select>
        </label>
        <label for="estreno">Fecha de estreno:
            <input type="date" id="estreno" name="fecha_estreno" value="<?php echo $fila['fecha_estreno'] ?>">
        </label>
        <label for="photo">Foto de portada:
            <input type="file" id="photo" name="foto" accept="image/*">
        </label>
        <fieldset id="botonModificando">
            <input type="submit" name="modificar" value="Modificar">
            <input type="submit" name="cancelar" value="Cancelar">
        </fieldset>
        
    </form>
        <?php
                }
            }else{
                echo 'NO se encontraron peliculas para modificar.';
            }
            desconectar($conexion);
        ?>
        </article>
        </main>
    </section>
<?php
require_once("../html/pie.html");
}else{
    header("Location:../index.php");
}
?>