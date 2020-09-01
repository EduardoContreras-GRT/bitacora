<?php
include_once '../model/TiposAsesoresModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$idTipoAsesor = $_POST["idTipoAsesor"];
@$nombreTipoAsesor = $_POST["nombreTipoAsesor"];
@$fechaCrecion = $_POST["fechaCrecion"];
@$activo= $_POST["activo"];



$TiposAsesoresModel = new TiposAsesoresModel();

switch($action){

    case "insert":              
        $dataArray = buildArray($_POST);      
        echo $TiposAsesoresModel->insertTiposAsesores($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idTipoAsesor ");
        $idValuesArray = ["idField" => "idTipoAsesor ", "idValue" => $idTipoAsesor];
        echo $TiposAsesoresModel->updateTiposAsesores($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idTipoAsesor", "idValue" => $idTipoAsesor];
        echo $TiposAsesoresModel->deleteTiposAsesores($idValuesArray);
    break;

    case "selectTable":
        $tables = "tiposasesores";
        $fields = "*";
        $where  = "";
        echo $TiposAsesoresModel->selectTiposAsesores($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "tiposasesores";
        $fields = "*";
        $where  = "";
        echo $TiposAsesoresModel->selectTiposAsesores($tables, $fields, $where);
    break;

    case "selectByName":
        $tables = "tiposasesores";
        $fields = "*";
        $where  =" nombrePlantillaGuion='" . $nombrePlantillaGuion . "'";
        echo $TiposAsesoresModel->selectTiposAsesores($tables, $fields, $where);
    break;

}


