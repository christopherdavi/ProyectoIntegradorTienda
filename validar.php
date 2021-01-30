<?php
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['correo']=$correo;

$conexion=mysqli_connect("localhost","root","");

include('conexion.php');

$consulta="SELECT*FROM correo where correo='$correo' and contraseña='$contraseña'";
$resultado=mysqi_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:inicio.html");
}else{
    ?>
    <php
        include("login.html");
        ?>
        <h1 class="bad">Error de la Autenticación</h1>
        <?php
}
mysqli_free_resultado($resultado);
mysqli_close($conexion); 