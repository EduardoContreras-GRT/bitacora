<?php
include_once '../model/TiposPlantillasGuionesModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$idTipoPlantillaGuion = $_POST["idTipoPlantillaGuion"];
@$nombreTiposPlantillaGuion = $_POST["nombreTiposPlantillaGuion"];
@$fechaCrecion = $_POST["fechaCrecion"];
@$activo= $_POST["activo"];

$TipoPlantillasGuionesModel = new TipoPlantillasGuionesModel();

switch($action){

    case "insert": 
        $dataArray = [
            "nombreTiposPlantillaGuion" => $nombreTiposPlantillaGuion,
            "activo" => "S" 
       ];             
      //  $dataArray = buildArray($_POST);      
        echo $TipoPlantillasGuionesModel-> insertTipoPlantillasGuiones($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idTemperaturaLead");
        $idValuesArray = ["idField" => "idTemperaturaLead", "idValue" => $idTipoPlantillaGuion];
        echo $TipoPlantillasGuionesModel->updateTipoPlantillasGuiones($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idTemperaturaLead", "idValue" => $idTipoPlantillaGuion];
        echo $TipoPlantillasGuionesModel->deleteTipoPlantillasGuiones($idValuesArray);
    break;

    case "selectTable":
        $tables = "tiposplantillasguiones";
        $fields = "*";
        $where  = "";
        echo $TipoPlantillasGuionesModel->selectTipoPlantillasGuiones($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "tiposplantillasguiones";
        $fields = "*";
        $where  = "";
        echo $TipoPlantillasGuionesModel->selectTipoPlantillasGuiones($tables, $fields, $where);
    break;
    
    case "selectByName":
        $tables = "tiposplantillasguiones";
        $fields = "*";
        $where  =" nombreTiposPlantillaGuion='" . $nombreTiposPlantillaGuion . "'";
       echo $TipoPlantillasGuionesModel->selectTipoPlantillasGuiones($tables, $fields, $where);
    break;

    case "selectById":
        $tables = "tiposplantillasguiones";
        $fields = "*";
        $where  = "idTipoPlantillaGuion='" . $idTipoPlantillaGuion . "'";
        echo $TipoPlantillasGuionesModel->selectTipoPlantillasGuiones($tables, $fields, $where);
    break;

}


