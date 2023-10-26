<?php

    function Conexion(){
        $host='localhost';
        $user= 'root';
        $pass= '';
        $db= 'hotel';
    
        try{
        $con= mysqli_connect($host,$user,$pass,$db);
        } catch (Exception $ex) {
         echo "fail";
        }
        return $con;
    }

?>