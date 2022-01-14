<?php
session_start();
if(!empty($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    $ruta = '../css';
    require_once("../html/encabezado.html");
?>
<section class="sectionContactenos">
    <?php
    require("menu.php");
    ?>
<main>
    <article>
        <?php
            if(!empty($_POST['motivo']) && !empty($_POST['mensaje']) && !empty($_SESSION['mail'])){
            $motivo = $_POST['motivo'];
            $asunto = $motivo.'-'.$usuario;
            $mensaje = $_POST['mensaje'];   
            $correoOrigen = $_SESSION['mail'];
            $correoDestino = 'labo2lisandro@gmail.com';
           
            $cabecera = 'From: ' .$correoOrigen. "\r\n" . 'Reply-To: ' .$correoOrigen;     
            $enviado = mail($correoDestino, $asunto, $mensaje, $cabecera);
            if($enviado){
                echo '<p>Envio exitoso!';
            }else{
                echo '<p>No se pudo enviar.';
            }
            }
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