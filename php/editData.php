<?php
include"dbcon.php"; 
$response = array( 
    'status' => 0, 
    'msg' => 'Ocurrió un problema, por favor intentelo de nuevo'
);
if(!empty($_REQUEST['id']) && !empty($_REQUEST['Nombre']) && !empty( $_REQUEST['pass']) && !empty($_REQUEST['rol'])){ 
    $first_name = $_REQUEST['id']; 
    $last_name = $_REQUEST['Nombre']; 
    $email = $_REQUEST['pass']; 
    $phone = $_REQUEST['rol']; 

    if ($phone == "Usuario"){
        $phone = 1;
    } else {
        $phone = 2;
    }
      
    if(!empty($_REQUEST['id'])){ 
        $id = intval($_REQUEST['id']); 
          
     
        $sql = "UPDATE usuario SET ID_DNI='$first_name', Nombre='$last_name', pass='$email', ID_Rol='$phone' WHERE ID_DNI = $id"; 
        $update = $conn->query($sql); 
          
        if($update){ 
            $response['status'] = 1; 
            $response['msg'] = 'Se editó correctamente!'; 
        } 
    } 
}else{ 
    $response['msg'] = 'Por favor completar los campos.'; 
} 
echo json_encode($response); 
?>