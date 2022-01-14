
<aside id="asideMenu">
    <nav id="navMenu">
        <ul class="ulUsuario">
            <li class="liUsuario"><img src="../img/usuarios/<?php if(!empty($_SESSION['foto'])){ echo $_SESSION['foto'];}else{ "../img/usuarios/usuario_default.png";}  ?>"><p class="pUsuario"><?php echo $_SESSION['usuario'] ?></p>    <a class="pUsuario" href="cerrar-sesion.php"> Cerrar Sesion</a></li>
        </ul>
            <h2 class="h2Menu">Usuarios</h2>
                <ul class="ulMenu">
                    <?php
                    if($_SESSION['tipo'] == 'Administrador'){
                        echo '<li class="liMenu"><a class="aMenu" href="usuario-alta.php">Nuevo usuario</a></li>';
                    }
                    ?>
                    <li class="liMenu"><a class="aMenu" href="usuario-listado.php">Listado de usuarios</a></li>
                </ul>
            <h2 class="h2Menu">Peliculas</h2>
                <ul class="ulMenu">
                    <li class="liMenu"><a class="aMenu" href="pelicula-listado.php">Listado de peliculas</a></li>
                    <li class="liMenu"><a class="aMenu" href="peliculas-fav-listado.php">Peliculas favoritas</a></li>
                    <li class="liMenu"><a class="aMenu" href="borrar-fav.php">Eliminar peliculas favoritas</a></li>
                    <?php
                    if($_SESSION['tipo'] == 'Administrador'){
                        echo '<li class="liMenu"><a class="aMenu" href="pelicula-alta.php">Agregar peliculas</a></li>';
                    }
                    ?>            
                </ul>
            <h2 class="h2Menu">Opciones</h2>
                <ul class="ulMenu">
                    <li class="liMenu"><a class="aMenu" href="contactenos.php">Contáctenos</a></li>
                </ul>
        </nav>
</aside>
    
