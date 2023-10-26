<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestion11.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/f49f6002f0.js" crossorigin="anonymous"></script>
</head>
<?php
include_once("Conexion.php");
session_start();
$users= $_SESSION['username'];
if(!isset($users)){
    header("Location: Login.html");
} else{

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
            <a href="Control2.php">Control</a>
            <a href="usuario.php">Personal</a>
            <a href="csesion.php">Cerrar sesión</a>
            </nav>
    </div>

    </header>

     <br>
    <section id="tabla">
        <div class="container">
                    <div class="listas">
                        <form action="Cargar.php" method="POST">
                            <div class="modal">
                                <div class="N">
                                    <p>Nº de habitación</p>
                                    <input type="text" name="tid" readonly=»readonly» value="" placeholder="N° de habitación" >
                                </div>
                                <p>DNI del cliente</p>
                                <input type="text" pattern="[0-9]+" name="tdni" maxlength="10" value="" placeholder="DNI" >
                                <p>Fecha de entrada</p>
                                <input type="date" name="tentrada" value="">
                                <p>Fecha de salida</p>
                                <input type="date" name="tsalida" value= "">
                                <div class="but">
                                    <br>
                                    <button type="submit" class="btna">Cargar</button>
                                </div>
                            </div>
                        </div>

                        </form>
                    </div> 
            </div>

            <div class="lista">
             <table class="tabla">
                <div class="columna__lista">
                <thead class= "text-muted">
                    <td class="text-center"><p>Habitación</p></td>
                    <td class="text-center"><p>Descripcion</p></td>
                    <td class="text-center"><p>Tipo de habitacion</p></td>
                    <td class="text-center"><p>Precio por día</p></td>
                    <td class="text-center"><p>Estado</p></td>
                    <td class="text-center"><p>Accion</p></td>
                    </thead>
                </div>
           
                <?php
                    $conn=Conexion();
                    $sql = "SELECT ID_Habitaciones AS Habitacion, habitaciones.Descripcion, tipo_de_habitacion.Descripcion AS Tipo, Precio_por_dia AS Precio, estado.Descripcion AS Estado FROM habitaciones, estado, tipo_de_habitacion WHERE habitaciones.ID_Estado= estado.ID_Estado AND tipo_de_habitacion.ID_Tipo_de_habitacion= habitaciones.ID_Tipo_de_habitacion";
                    $result = mysqli_query($conn, $sql);

                while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                    <div class="columna__datos">
                        <Tbody class="cuerpo">
                            <td class="text-center" name="habitacion"><?php echo $mostrar['Habitacion'] ?></td>
                            <td class="text-center"><?php echo $mostrar['Descripcion'] ?></td>
                            <td class="text-center"><?php echo $mostrar['Tipo'] ?></td>
                            <td class="text-center"><?php echo "$ "; echo $mostrar['Precio'] ?></td>
                            <td class="text-center"><?php echo $mostrar['Estado'] ?></td>
                            <td class="text-center"> <a class="select" href="gestion1.php? ID= <?php echo $mostrar['Habitacion'] ?>" name="boton">Seleccionar</a>
                                <a class="limpiar" href="limpiar.php? ID= <?php echo $mostrar['Habitacion'] ?>" name="boton">Limpiar</a>
                            </td>
                            </Tbody>

                </div>
                <?php
                }
                ?>
            </table>       
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
