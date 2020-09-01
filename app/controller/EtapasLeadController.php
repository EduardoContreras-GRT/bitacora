<?php
include_once '../model/EtapasLeadModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$idEtapaLead = $_POST["idEtapaLead"];
@$nombreEtapa = $_POST["nombreEtapa"];
@$descripcionEtapa = $_POST["descripcionEtapa"];
@$orden = $_POST["orden"];
@$activo = $_POST["activo"];
@$fechaCreacion = $_POST["fechaCreacion"];

$EtapasLeadModel = new EtapasLeadModel();

switch($action){

    case "insert":              
        $dataArray = [
           
            "nombreEtapa" => $nombreEtapa,
            "descripcionEtapa" => $descripcionEtapa,
            "orden" => $orden,
            "activo" => "S"
       ]; 
       
       
        //$dataArray = buildArray($_POST);      
        echo $EtapasLeadModel->insertEtapasLead($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idEtapaLead");
        $idValuesArray = ["idField" => "idEtapaLead", "idValue" => $idEtapaLead];
        echo $EtapasLeadModel->updateEtapasLead($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idEtapaLead", "idValue" => $idEtapaLead];
        echo $EtapasLeadModel->deleteEtapasLead($idValuesArray);
    break;

    case "selectTable":
        $tables = "etapaslead";
        $fields = "*";
        $where  = "";
        echo $EtapasLeadModel->selectEtapasLead($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "etapaslead";
        $fields = "*";
        $where  = "";
        echo $EtapasLeadModel->selectEtapasLead($tables, $fields, $where);
    break;
    case "selectCombo":
        $tables = "etapaslead";
        $fields = "idEtapaLead, nombreEtapa, descripcionEtapa, orden, activo";
        $where  = "";
        echo $ParticipantesModel->selectParticipante($tables, $fields, $where);
    break;

}


