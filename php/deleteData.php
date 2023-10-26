<?php
include("dbcon.php"); 
$response = array( 
    'status' => 0, 
    'msg' => 'Ocurrió un problema, por favor intentelo de nuevo'
); 
if(!empty($_REQUEST['id'])){ 
    $id = intval($_REQUEST['id']); 
      
 
    $sql = "DELETE FROM usuario WHERE ID_DNI = $id"; 
    $delete = $conn->query($sql); 
      
    if($delete){ 
        $response['status'] = 1; 
        $response['msg'] = 'Fue eliminado correctamente!'; 
    } 
} 
echo json_encode($response);
?>