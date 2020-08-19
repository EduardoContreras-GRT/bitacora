<?php
include_once '../model/UsuarioModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$idFuenteLead = $_POST["idFuenteLead"];
@$nombreFuente= $_POST["nombreFuente"];
@$fechaCrecion = $_POST["fechaCrecion"];
@$activo= $_POST["activo"];


$FuentesLeadModel = new FuentesLeadModel();

switch($action){

    case "insert":              
        $dataArray = buildArray($_POST);      
        echo $FuentesLeadModel->insertFuentesLead($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idFuenteLead");
        $idValuesArray = ["idField" => "idFuenteLead", "idValue" => $idFuenteLead];
        echo $FuentesLeadModel->updateFuentesLead($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idFuenteLead", "idValue" => $idFuenteLead];
        echo $FuentesLeadModel->deleteFuentesLead($idValuesArray);
    break;

    case "select":
        $tables = "fuenteslead";
        $fields = "*";
        $where  = "";
        echo $FuentesLeadModel->selectFuentesLead($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "fuenteslead";
        $fields = "*";
        $where  = "";
        echo $FuentesLeadModel->selectFuentesLead($tables, $fields, $where);
    break;

}


