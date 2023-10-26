<?php
include_once("Conexion.php");
session_start();

login();
function login(){
    
    $userl=$_POST['id'];
    $passl=$_POST['contraseña'];
    $conn=Conexion();
    $sqll= "SELECT * FROM `usuario` WHERE `ID_DNI`= $userl AND `pass` = $passl";
    $result=mysqli_query($conn,$sqll);

    $filas=mysqli_num_rows($result);
    $m = mysqli_fetch_array($result);
    $rol= $m['ID_Rol'];
    if($filas>0){
        if($rol== 2){
        $_SESSION['username'] = $userl;
        $sqll= "INSERT INTO `control`(`Fecha`, `Accion`, `ID_DNI`) VALUES (now(),'Sesion iniciada',$userl)";
        $result=mysqli_query($conn,$sqll);

        header("Location: gestion.php");
        } else{
            $_SESSION['username'] = $userl;
        $sqll= "INSERT INTO `control`(`Fecha`, `Accion`, `ID_DNI`) VALUES (now(),'Sesion iniciada',$userl)";
        $result=mysqli_query($conn,$sqll);

        header("Location: gestion2.php");
        }
    } else {
        header ("Location: Usuario.html");
    }
        
        
       
}
    
    
?>