<?php
include("dbcon.php"); 
$response = array( 
    'status' => 0, 
    'msg' => 'Ocurrió un problema, por favor intentelo de nuevo'
);

if(!empty($_REQUEST['id']) && !empty($_REQUEST['Nombre']) && !empty( $_REQUEST['pass']) && !empty($_REQUEST['rol'])){ 
    $first_name = $_REQUEST['id']; 
    $last_name = $_REQUEST['Nombre']; 
    $email = $_REQUEST['pass']; 
    $phone = $_REQUEST['rol'];
  
    $sql = "INSERT INTO usuario(ID_DNI,Nombre,pass,ID_Rol) VALUES ('$first_name','$last_name','$email','$phone')"; 
    $insert = $conn->query($sql); 
  
 if($insert){ 
        $response['status'] = 1; 
        $response['msg'] = 'Guardado correctamente!'; 
    } 
}else{ 
    $response['msg'] = 'Por favor completar los campos.'; 
}

echo json_encode($response);
?>