<?php
session_start();

?>
<html>
<head>
    <title>Formulario de verificacion</title>
    <style>
        body {
            background-color: #FFB15F;
            text-align: center;
        }
        img{
          align: center;
        }
    </style>
</head>
<body>
<?php
//Comenzamos la sesión:

//Definimos las variables de la base de datos
$servername = "mysql";
$username = "raul";
$password = "pedo";
$database = "usuarios";
// Create connection
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn, $database);

//Variables del formulario
$nombre = $_POST['nombre1'];
$contra = $_POST['contra'];

//Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}elseif ($conn){
  echo "Connected successfully <br/>";
}
//Consulta

$consulta= "SELECT * FROM gente where nombre = '$nombre'";
$resultado = mysqli_query($conn,$consulta);

//Array asociativo
$final = mysqli_fetch_assoc($resultado);
$usuarioDB = $final['nombre'];
$contraDB = $final['passwd'];



if($nombre == '' || $contra == ''){
  echo "Usuario o contraseña incorrectos.<br>";
  echo "<a href = 'formulario.php'>Volver a intentar</a>";
  die();
  
}elseif ($nombre == $usuarioDB && $contra == $contraDB){
echo "<h2>Bienvenido $usuarioDB </h2><br/>";
echo "<img src='imagenes/naruto.gif'>";
}

$_SESSION['usuario'] = $usuarioDB;
?>
<br/><a href="berga.php"> cerrar sesion </a>
<?php


mysqli_close($conn);
?> 
</body>
</html>
