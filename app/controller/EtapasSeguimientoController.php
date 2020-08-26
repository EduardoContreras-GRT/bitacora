<?php

include_once '../model/EtapasSeguimiento.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$idEtapaSeguimiento = $_POST["idEtapaSeguimiento"];
@$nombreEtapaSeguimiento = $_POST["nombreEtapaSeguimiento"];
@$fechaCreacion = $_POST["fechaCreacion"];
@$activo = $_POST["activo"];


$EtapasSeguimientoModel = new EtapasSeguimientoModel();

switch($action){

    case "insert":              
        $dataArray = buildArray($_POST);      
        echo $EtapasSeguimientoModel->insertEtapasSeguimiento($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idEtapaSeguimiento");
        $idValuesArray = ["idField" => "idEtapaSeguimiento", "idValue" => $idEtapaSeguimiento];
        echo $EtapasSeguimientoModel->updateEtapasSeguimiento($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idEtapaSeguimiento", "idValue" => $idEtapaSeguimiento];
        echo $EtapasSeguimientoModel->deleteEtapasSeguimiento($idValuesArray);
    break;

    case "selectTable":
        $tables = "etapasseguimientos";
        $fields = "*";
        $where  = "";
        echo $EtapasSeguimientoModel->selectEtapasSeguimiento($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "etapasseguimientos";
        $fields = "*";
        $where  = "";
        echo $EtapasSeguimientoModel->selectEtapasSeguimiento($tables, $fields, $where);
    break;

    case "selectByName":
        $tables = "etapasseguimientos";
        $fields = "*";
        $where  =" nombreEtapaSeguimiento='" . $nombreEtapaSeguimiento . "'";
        echo $EtapasSeguimientoModel->selectEtapasSeguimiento($tables, $fields, $where);
    break;


}


