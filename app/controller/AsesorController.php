<?php
include_once '../model/UsuarioModel.Class.php';
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
        $dataArray = buildArray($_POST);      
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

    case "select":
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

}


