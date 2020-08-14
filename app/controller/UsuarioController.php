<?php
include_once '../model/UsuarioModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$IdUsuarios = $_POST["IdUsuarios"];
@$Nombre = $_POST["Nombre"];
@$Usuario = $_POST["Usuario"];
@$Password = $_POST["Password"];
@$PasswordEncrip = $_POST["PasswordEncrip"];
@$Activo= $_POST["Activo"];
@$FechaCrecion = $_POST["FechaCrecion"];
@$FechaModificacion = $_POST["FechaModificacion"];
@$FechaUltimaSesion= $_POST["FechaUltimaSesion"];
@$IdRol= $_POST["IdRol"];
@$IdAgencia= $_POST["IdAgencia"];


$UsuariosModel = new UsuariosModel();

switch($action){

    case "insert":              
        $dataArray = buildArray($_POST);      
        echo $UsuariosModel->insertUsuario($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "IdUsuarios");
        $idValuesArray = ["idField" => "IdUsuarios", "idValue" => $IdUsuarios];
        echo $UsuariosModel->updateUsuario($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "IdUsuarios", "idValue" => $IdUsuarios];
        echo $UsuariosModel->deleteUsuario($idValuesArray);
    break;

    case "select":
        $tables = "usuario";
        $fields = "*";
        $where  = "";
        echo $UsuariosModel->selectUsuario($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "usuario";
        $fields = "*";
        $where  = "";
        echo $UsuariosModel->selectUsuario($tables, $fields, $where);
    break;

}


