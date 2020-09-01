<?php
include_once '../model/AsesorModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$idAsesor = $_POST["idAsesor"];
@$nombreCompleto = $_POST["nombreCompleto"];
@$nombre = $_POST["nombre"];
@$apellidoPaterno = $_POST["apellidoPaterno"];
@$apellidoMaterno = $_POST["apellidoMaterno"];
@$fechaCreacion = $_POST["fechaCreacion"];
@$Activo= $_POST["Activo"];
@$tipoAsesor = $_POST["tipoAsesor"];
@$Agencias_idAgencias = $_POST["Agencias_idAgencias"];
@$usuario = $_POST["usuario"];
@$password = $_POST["password"];
@$passCrypt = $_POST["passCrypt"];

$AsesoresModel = new AsesoresModel();

switch($action){

    case "insert":  
        $dataArray = [
           
            "nombre" => $nombreCompleto,
            "apellidoPaterno" => $apellidoPaterno,
            "apellidoMaterno" => $apellidoMaterno,
            "Activo" => "S",
            "tipoAsesor" => $tipoAsesor
       ]; 
       // $dataArray = buildArray($_POST);      
        echo $AsesoresModel->insertAsesores($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idAsesor");
        $idValuesArray = ["idField" => "idAsesor", "idValue" => $idAsesor];
        echo $AsesoresModel->updateAsesores($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idAsesor", "idValue" => $idAsesor];
        echo $AsesoresModel->deleteAsesores($idValuesArray);
    break;

    case "selectTable":
        $tables = "asesores";
        $fields = "*";
        $where  = "";
        echo $AsesoresModel->selectAsesores($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "asesores";
        $fields = "*";
        $where  = "";
        echo $AsesoresModel->selectAsesores($tables, $fields, $where);
    break;

    case "selectByName":
        $tables = "asesores";
        $fields = "*";
        $where  = " nombre='" . $nombre . "'";
        echo $AsesoresModel->selectAsesores($tables, $fields, $where);
    break;

    case "selectById":
        $tables = "asesores";
        $fields = "*";
        $where  = "idAsesor='" . $idAsesor . "'";
        echo $AsesoresModel->selectAsesores($tables, $fields, $where);
    break;
    
    case "consultaTipoAsesor":
        $tables = "asesores AS, tiposasesores TA, Agencias AG"; 
        $fields = "AS.idAsesor, AS.nombre, AS.apellidoPaterno, AS.apellidoMaterno, AS.tipoAsesor, AS.Agencias_idAgencias";
        $where = "AS.tipoAsesor = TA.nombreTipoAsesor AND AS.Agencias_idAgencias = AG.idAgencia";
 echo $AsesoresModel->selectAsesores($tables, $fields, $where);
    break;
    

   


}


