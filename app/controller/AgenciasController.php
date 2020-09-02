<?php
include_once '../model/AgenciasModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$IdAgencia = $_POST["IdAgencia"];
@$Nombre = $_POST["Nombre"];
@$Activo= $_POST["Activo"];
@$FechaCrecion = $_POST["FechaCrecion"];
@$FechaModificacion = $_POST["FechaModificacion"];


$AgenciasModel = new AgenciasModel();

switch($action){

    case "insert":      
      $dataArray = [
            "Nombre" => $Nombre,
            "Activo" => "S" 
       ]; 
      //  echo $AgenciasModel->insertAgencias($dataArray); 
      //echo $Nombre;
     // var_dump($_POST);
  
        // $dataArray = buildArray($_POST);      
         echo $AgenciasModel->insertAgencias($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "IdAgencia");
        $idValuesArray = ["idField" => "IdAgencia", "idValue" => $IdAgencia];
        echo $AgenciasModel->updateAgencias($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "IdAgencia", "idValue" => $IdAgencia];
        echo $AgenciasModel->deleteAgencias($idValuesArray);
    break;

    case "selectTable":
        $tables = "agencias";
        $fields = "*";
        $where  = "";
        echo $AgenciasModel->selectAgencias($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "agencias";
        $fields = "*";
        $where  = "";
        echo $AgenciasModel->selectAgencias($tables, $fields, $where);
    break;

    case "selectByName":
        $tables = "agencias";
        $fields = "*";
        $where  = " Nombre='" . $Nombre . "'";
        echo $AgenciasModel->selectAgencias($tables, $fields, $where);
    break;

    case "selectById":
        $tables = "agencias";
        $fields = "*";
        $where  = " IdAgencia='" . $IdAgencia . "'";
        echo $AgenciasModel->selectAgencias($tables, $fields, $where);
    break;


    

}


