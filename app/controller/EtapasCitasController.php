<?php
include_once '../model/EtapasCitasModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$idEtapaCitas = $_POST["idEtapaCita"];
@$nombreEtapa = $_POST["nombreEtapa"];
@$descripcionEtapa = $_POST["descripcionEtapa"];
@$orden = $_POST["orden"];
@$activo = $_POST["activo"];
@$fechaCreacion = $_POST["fechaCreacion"];

$EtapasCitasModel = new EtapasCitasModel();

switch($action){

    case "insert":    
        $dataArray = [
           
            "nombreEtapa" => $nombreEtapa,
            "descripcionEtapa" => $descripcionEtapa,
            "orden" => $orden,
            "activo" => "S"
           
       ];           
       // $dataArray = buildArray($_POST);      
        echo $EtapasCitasModel->insertEtapasCitas($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idEtapaCitas");
        $idValuesArray = ["idField" => "idEtapaCitas", "idValue" => $idEtapaCitas];
        echo $EtapasCitasModel->updateEtapasCitas($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idEtapaCitas", "idValue" => $idEtapaCitas];
        echo $EtapasCitasModel->deleteEtapasCitas($idValuesArray);
    break;

    case "selectTable":
        $tables = "etapascitas";
        $fields = "*";
        $where  = "";
        echo $EtapasCitasModel->selectEtapasCitas($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "etapascitas";
        $fields = "*";
        $where  = "";
        echo $EtapasCitasModel->selectEtapasCitas($tables, $fields, $where);
    break;

    case "selectCombo1":
        $tables = "etapascitas";
        $fields = "nombreEtapa, descripcionEtapa, orden, activo";
        $where  = "";
        echo $EtapasCitasModel->selectEtapasCitas($tables, $fields, $where);
    break;

    case "selectByName":
        $tables = "etapascitas";
        $fields = "*";
        $where  = " nombreEtapa='" . $nombreEtapa . "'";
        echo $EtapasCitasModel->selectEtapasCitas($tables, $fields, $where);
    break;


}


