<?php
include_once '../model/UsuarioModel.Class.php';
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
        $dataArray = buildArray($_POST);      
        echo $EtapasCitasModel->inserEtapasCitas($dataArray);        
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

    case "select":
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

}

