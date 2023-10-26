<?php
include_once("Conexion.php");
delete();
?>

<?php
function delete(){
    $connc=Conexion();
    $sqlc = "DELETE FROM `control`";
    $resulr= mysqli_query($connc,$sqlc);
    header ("Location: control.php");
}

?>