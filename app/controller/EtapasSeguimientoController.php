<?php
include_once '../model/UsuarioModel.Class.php';
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
        echo $EtapasSeguimientoModel->inserEtapasSeguimiento($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idEtapaSeguimiento");
        $idValuesArray = ["idField" => "idEtapaSeguimiento", "idValue" => $idEtapaSeguimiento];
        echo $EtapasSeguimiento->updateEtapasSeguimiento($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idEtapaSeguimiento", "idValue" => $idEtapaSeguimiento];
        echo $EtapasSeguimiento->deleteEtapasSeguimiento($idValuesArray);
    break;

    case "select":
        $tables = "etapasseguimientos";
        $fields = "*";
        $where  = "";
        echo $EtapasSeguimiento->selectEtapasSeguimiento($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "etapasseguimientos";
        $fields = "*";
        $where  = "";
        echo $EtapasSeguimiento->selectEtapasSeguimiento($tables, $fields, $where);
    break;

}


