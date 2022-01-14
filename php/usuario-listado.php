<?php
session_start();
if(!empty($_SESSION['usuario'])){
$ruta = '../css';
require_once("../html/encabezado.html");
echo '<section id="sectionUsu">';
require("menu.php");
?>
    <main id="mainUsu">
        <table>
            <caption>Listado de usuarios</caption>
                <thead>
                    <tr><th>Usuario</th><th>Mail</th><th>Fecha alta</th><th>Tipo</th></tr>
                </thead>
                <tbody>
                    <?php
                    require("conexion.php");
                    $conexion = conectar();
                    $consulta = 'SELECT * FROM usuario';
                    $q = mysqli_query($conexion, $consulta);
                    $resultado = mysqli_num_rows($q);
                    if($resultado){
                        while($fila = mysqli_fetch_array($q)){
                            echo '<tr><td>'.$fila['usuario'].'</td><td>'.$fila['mail'].'/td><td>'.$fila['fecha_alta'].'</td><td>'.$fila['tipo'].'</td></tr>';
                        }
                    }
                    desconectar($conexion);
                    ?>
                    
                </tbody>
        </table>
    </main>
</section>
<?php
require_once("../html/pie.html");
}else{
    header("Location:../index.php");
}
?>