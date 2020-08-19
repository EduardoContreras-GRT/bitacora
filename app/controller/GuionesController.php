<?php
include_once '../model/UsuarioModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$idTipoPlantillaGuion = $_POST["idTipoPlantillaGuion"];
@$nombreTiposPlantillaGuion = $_POST["nombreTiposPlantillaGuion"];
@$fechaCrecion = $_POST["fechaCrecion"];
@$activo= $_POST["activo"];


$GuionesModel = new GuionesModel();

switch($action){

    case "insert":              
        $dataArray = buildArray($_POST);      
        echo $GuionesModel->insertGuiones($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idTipoPlantillaGuion");
        $idValuesArray = ["idField" => "idTipoPlantillaGuion", "idValue" => $idTipoPlantillaGuion];
        echo $GuionesModel->updateGuiones($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idTipoPlantillaGuion", "idValue" => $idTipoPlantillaGuion];
        echo $GuionesModel->deleteGuiones($idValuesArray);
    break;

    case "select":
        $tables = "tiposplantillasguiones";
        $fields = "*";
        $where  = "";
        echo $GuionesModel->selectGuiones($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "Guiones";
        $fields = "*";
        $where  = "";
        echo $GuionesModel->selectGuiones($tables, $fields, $where);
    break;

}


