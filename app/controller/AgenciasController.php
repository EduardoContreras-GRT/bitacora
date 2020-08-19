<?php
include_once '../model/UsuarioModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$IdAgencia = $_POST["IdAgencia"];
@$Nombre = $_POST["Nombre"];
@$Activo= $_POST["Activo"];
@$FechaCrecion = $_POST["FechaCrecion"];
@$FechaModificacion = $_POST["FechaModificacion"];


$AgenciasModel = new AgenciasModel();

switch($action){

    case "insert":              
        $dataArray = buildArray($_POST);      
        echo $AgenciasModel->insertAgencias($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "IdAgencia");
        $idValuesArray = ["idField" => "IdAgencia", "idValue" => $IdAgencia];
        echo $AgenciasModel->updateAgencias($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "IdAgencia", "idValue" => $IdAgencia];
        echo $AgenciasModel->deleteAgencias($idValuesArray);
    break;

    case "select":
        $tables = "agencias";
        $fields = "*";
        $where  = "";
        echo $AgenciasModel->selectAgencias($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "agencias";
        $fields = "*";
        $where  = "";
        echo $AgenciasModel->selectAgencias($tables, $fields, $where);
    break;

}


