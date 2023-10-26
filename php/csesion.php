<?php
include_once("Conexion.php");
session_start();

$userp= $_SESSION['username'];
$conn=Conexion();
$sqll= "INSERT INTO `control`(`Fecha`, `Accion`, `ID_DNI`) VALUES (now(),'Sesion cerrada',$userp)";
$result=mysqli_query($conn,$sqll);


// Configuración de la base de datos
$servername = "localhost"; // Cambia esto por el nombre de tu servidor si es diferente
$username = "root"; // Cambia esto por tu nombre de usuario de la base de datos
$password = ""; // Cambia esto por tu contraseña de la base de datos
$database = "hotel"; // Cambia esto por el nombre de tu base de datos

// Configuración del respaldo
$backup_path = "C:\Users\Fernando\OneDrive\Desktop\Respaldo"; // Cambia esto por la ruta donde quieres guardar el respaldo
$backup_filename = "backup_" . date("Y-m-d_H-i-s") . ".sql"; // Nombre del archivo de respaldo con fecha y hora

// Comando para realizar el respaldo
$command = "mysqldump -u $username -p$password -h $servername $database > $backup_path/$backup_filename";

// Ejecución del comando en la línea de comandos
exec($command);


session_destroy();

header("Location: Login.html");
exit();

?>