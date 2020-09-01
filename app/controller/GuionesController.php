<?php
include_once '../model/GuionesModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$idPlantillaGuion = $_POST["idPlantillaGuion"];
@$nombrePlantillaGuion = $_POST["nombrePlantillaGuion"];
@$descripcion= $_POST["descripcion"];
@$fechaCrecion = $_POST["fechaCrecion"];
@$activo= $_POST["activo"];
@$TipoPlantillaGuion= $_POST["TipoPlantillaGuion"];
@$orden= $_POST["orden"];


$GuionesModel = new GuionesModel();

switch($action){

    case "insert": 
        $dataArray = [
            "nombrePlantillaGuion" => $nombrePlantillaGuion,
            "activo" => "S" 
       ];     
       // $dataArray = buildArray($_POST);      
        echo $GuionesModel->insertGuiones($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idPlantillaGuion");
        $idValuesArray = ["idField" => "idPlantillaGuion", "idValue" => $idPlantillaGuion];
        echo $GuionesModel->updateGuiones($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idPlantillaGuion", "idValue" => $idPlantillaGuion];
        echo $GuionesModel->deleteGuiones($idValuesArray);
    break;

    case "selectTable":
        $tables = "plantillasguiones";
        $fields = "*";
        $where  = "";
        echo $GuionesModel->selectGuiones($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "plantillasguiones";
        $fields = "*";
        $where  = "";
        echo $GuionesModel->selectGuiones($tables, $fields, $where);
    break;

    case "selectByName":
        $tables = "plantillasguiones";
        $fields = "*";
        $where  =" nombrePlantillaGuion='" . $nombrePlantillaGuion . "'";
        echo $GuionesModel->selectGuiones($tables, $fields, $where);
    break;

}


