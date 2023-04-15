<?php

session_start();

$conexion=mysqli_connect("localhost","root","","login");
//include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

$_SESSION['usuario']=$usuario;



//INSERT INTO `usuarios` (`ID`, `Nombre`, `Usuario`, `Contraseña`) VALUES ('1', 'Andres', 'andrenanper', '4ndr3s86');

$consulta="SELECT*FROM usuarios where Usuario='$usuario' and Contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:home.php");

}else{
    ?>
    <?php
    include("index.php");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);