<?php
session_start();
require_once("conexion.php");

    $formularioCompleto = false;
        if(!empty($_POST['usuario']) && !empty($_POST['contra'])){
            $usuario = ($_POST['usuario']);
            $pass = sha1($_POST['contra']); 
            $formularioCompleto = true; 
  
        }else{
            $error = '<p>Faltan datos</p>';
            echo $error;
                $usuarioCorrecto = NULL; 
                $conexion = NULL;
                $usuario = NULL;
                $pass = NULL;
        }
        if($formularioCompleto = true){
            $conexion = conectar();  
                 if($conexion){
                    $consulta = 'SELECT *
                                 FROM usuario 
                                 WHERE usuario = \'' . $usuario .'\' AND password=\'' . $pass . '\'';

                    $query = mysqli_query($conexion, $consulta);        
                    if(mysqli_num_rows($query)){
                        $legible = mysqli_fetch_array($query);
                        $_SESSION['usuario'] = $legible['usuario'];
                        $_SESSION['mail'] = $legible['mail'];
                        $_SESSION['tipo'] = $legible['tipo'];
                        if (empty($legible['foto'])) {
                            $_SESSION['foto'] = 'usuario_default.png';
                        } else {
                            $_SESSION['foto'] = $legible['foto'];
                        }
                        header('refresh:0; url=pelicula-listado.php');
                    }else{
                        $error ='<p>Clave o usuario incorrectos. Redirigiendo</p>';
                        echo $error;
                    }
                 }
             }      
        desconectar ($conexion);
