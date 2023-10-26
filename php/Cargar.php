<?php
include_once("Conexion.php");
?>
<?php

funcion();
   function funcion(){
    $idc = $_POST['tid'];
    $dnic = $_POST['tdni'];
    $entc = $_POST['tentrada'];
    $salc = $_POST['tsalida'];

    $connc=Conexion();
    $sqlc = "UPDATE `habitaciones` SET `DNI_del_cliente_actual`='$dnic',`Fecha_de_ingreso`='$entc',`Fecha_de_Salida`='$salc',`ID_Estado`='2' WHERE $idc = ID_habitaciones";
    $resulc= mysqli_query($connc,$sqlc);
    header ("Location: gestion.php");

    

    }
?>
