<?php
include_once '../model/TemperaturasModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$idTemperaturaLead = $_POST["idTemperaturaLead"];
@$nombreTemperatura = $_POST["nombreTemperatura"];
@$fechaCrecion = $_POST["fechaCrecion"];
@$activo= $_POST["activo"];


$TemperaturaModel = new TemperaturaModel();

switch($action){

    case "insert": 
        $dataArray = [
            "nombreTemperatura" => $nombreTemperatura,
            "activo" => "S" 
       ];             
      //  $dataArray = buildArray($_POST);      
        echo $TemperaturaModel->insertTemperatura($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idTemperaturaLead");
        $idValuesArray = ["idField" => "idTemperaturaLead", "idValue" => $idTemperaturaLead];
        echo $TemperaturaModel->updateTemperatura($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idTemperaturaLead", "idValue" => $idTemperaturaLead];
        echo $TemperaturaModel->deleteTemperatura($idValuesArray);
    break;

    case "selectTable":
        $tables = "temperaturaslead";
        $fields = "*";
        $where  = "";
        echo $TemperaturaModel->selectTemperatura($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "Temperaturaslead";
        $fields = "*";
        $where  = "";
        echo $TemperaturaModel->selectTemperatura($tables, $fields, $where);
    break;
    case "selectByName":
        $tables = "Temperaturaslead";
        $fields = "*";
        $where  =" nombreTemperatura='" . $nombreTemperatura . "'";
       echo $TemperaturaModel->selectTemperatura($tables, $fields, $where);
    break;

}


