<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="usuario1.css">
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
</head>
<?php
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
            <a href="control2.php">Control</a>
            <a href="usuario.php">Personal</a>
            <a href="csesion.php">Cerrar sesión</a>
        </nav>
    </div>
</header>
<section id="tabla">
    <table id="dg" title="Users Management" class="easyui-datagrid" url="getData.php" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:50%;height:400px;">
        <thead>
            <tr>
                <th field="id" width="50">Usuario</th>
                <th field="Nombre" width="50">Nombre</th>
                <th field="pass" width="50">Contraseña</th>
                <th field="rol" width="50">Rol</th>
            </tr>
        </thead>
    </table>

    <div id="toolbar">
    <div id="tb2" >
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Crear usuario</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar usuario</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar usuario</a>
    </div>
    </div>

    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Informacion del usuario</h3>
            <div style="margin-bottom:10px">
                <input name="id" class="easyui-textbox" required="true" label="Usuario:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="Nombre" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="pass" class="easyui-textbox" required="true" label="Pass:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
            <input name="rol" class="easyui-textbox" required="true" label="Rol:" style="width:100%">
            </div>
        </form>
    </div>

    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>
    </section>
    <script type="text/javascript">
        
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Crear usuario');
            $('#fm').form('clear');
            url = 'addData.php';
        }
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar usuario');
                $('#fm').form('load',row);
                url = 'editData.php?id='+row.id;
            }
        }
        function saveUser(){
            $('#fm').form('submit',{
                url: url,
                iframe: false,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }
        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirmar','¿Estas seguro de eliminar este usuario?',function(r){
                    if (r){
                        $.post('deleteData.php', {id:row.id}, function(response){
                            if(response.status == 1){
                                $('#dg').datagrid('reload');
                            }else{
                                $.messager.show({
                                title: 'Error',
                                 msg: respData.msg
                            });
                            }
                        },'json');
                    }
                });
            }
        }
 </script>
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