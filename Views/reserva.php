<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reservar2.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/f49f6002f0.js" crossorigin="anonymous"></script>
    <script lenguage="javascript" src="js/jquery-3-6-3.js"></script>
</head>
<?php
include_once("Conexion.php");
session_start();
$users= $_SESSION['username'];
if(!isset($users)){
    header("Location: Login.html");
} else{
$est= "";
$estado= "Seleccionar";
if (isset($_POST['combo'])){
    $estado= $_POST ['combo'];
    $conn=Conexion();
    $sql = "SELECT tipo_de_habitacion.Descripcion as Estado FROM habitaciones, tipo_de_habitacion WHERE $estado = ID_Habitaciones AND tipo_de_habitacion.ID_Tipo_de_habitacion = habitaciones.ID_Tipo_de_habitacion ";
    $resulta = mysqli_query($conn, $sql);
    $mostr = mysqli_fetch_array($resulta);
    $est= $mostr['Estado'];
}
?>
<body>
    <header>
    <div class="container">
           <a href="index.html" class="logo">
            <img src="IMG/logo.png">
            <h2 class="logo">FerpoHotel </h2>
            </a>     
        <nav>
            <a href="gestion.php">Habitaciones</a>
            <a href="reserva.php">Reservaciones</a>
            <a href="control2.php">Control</a>
            <a href="usuario.php">Personal</a>
            <a href="csesion.php">Cerrar sesión</a>
        </nav>
    </div>

    </header>

    <br>
    <section id="tabla">
        <div class="container">

            <div class="lista">   
                <div class="modal">  
                    <form action="reserva1.php" method="POST">
                        <label>Habitación Disponible: </label>
                        <select class="combo" name="combo" id="combo">
                        <option value="<?php echo $estado ?>"><?php echo $estado ?></option>
                        <?php
                        $conn=Conexion();
                        $sql = "SELECT ID_Habitaciones FROM habitaciones WHERE ID_Estado =1";
                        $result = mysqli_query($conn, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $mostrar['ID_Habitaciones'] ?>"> <?php echo $mostrar['ID_Habitaciones'] ?> </option>
       
                            <?php
                        }
                        ?>
                       
                        </select>
                        <button class="se">Seleccionar</button>
                    </form>

                    <label for="">Tipo de habitación: </label>
                    <input class="ti" type="text" value="<?php echo $est ?>">
                    <br>
                    <label for="">N° de reserva</label>
                    <input type="text" name="tid" readonly=»readonly» id="tid" value="" placeholder="N° de reserva" >
                    <div class="but">
                        <br>
                        <a href="cargar1.php?combo=<?php echo $estado ?>&reserva=<?php echo $ID ?>">Cargar</a>
                    </div>
                   
                </div>

            </div>


            <div class="lista">
                <table border="4">
                    <tr>
                    <th>N° de Reservación </th>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Tipo de habitacion</th>
                    <th>Fecha de reservación</th>
                    <th>Fecha de salida</th>
                    <th>Accion</th>
                    </tr>
           
                    <?php
                    $conn=Conexion();
                    $sql = "SELECT `Fecha_de_reservacion` as Reservación,`Fecha_de_salida` AS Fin, `Nombre_Completo`, `DNI`, `ID_Reservacion` as IDR, tipo_de_habitacion.Descripcion as tipo FROM `reservaciones`, tipo_de_habitacion WHERE reservaciones.ID_Tipo_de_habitacion = tipo_de_habitacion.ID_Tipo_de_habitacion ORDER BY Fecha_de_reservacion";
                    $result = mysqli_query($conn, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $mostrar['IDR'] ?></td>
                            <td><?php echo $mostrar['DNI'] ?></td>
                            <td><?php echo $mostrar['Nombre_Completo'] ?></td>
                            <td><?php echo $mostrar['tipo'] ?></td>
                            <td><?php echo $mostrar['Reservación'] ?></td>
                            <td><?php echo $mostrar['Fin'] ?></td>
                            <td> <a class="select" href="reserva1.php? ID= <?php echo $mostrar['IDR'] ?>" name="boton">Seleccionar</a>
                            <a class="limpiar" href="Eliminar1.php? ID= <?php echo $mostrar['IDR'] ?>" name="boton">Eliminar</a>
                            </td>
                        </tr>

       
                    <?php
                    }
                    ?>
                </table>
            </div>

        </div>
        
    </section>

</body>

<footer>
    <section id="pie">
        <div class="container">
            <div class="copy">
                <p>&copy; FerpoHotel 2022</p>
            </div> 
        </div>    
    </section> 
</footer>
<?php
        }
?>
</html>