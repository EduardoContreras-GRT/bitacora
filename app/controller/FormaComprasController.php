<?php
include_once '../model/FormaCompraModel.Class.php';
include_once '../lib/arraysParams/arraysParams.php';

@$action = $_POST["action"];
@$idMetodoCompra = $_POST["idMetodoCompra"];
@$nombreMetodoCompra = $_POST["nombreMetodoCompra"];
@$fechaCrecion = $_POST["fechaCrecion"];
@$activo= $_POST["activo"];


$MetodoCompraModel = new MetodoCompraModel();

switch($action){

    case "insert":    
        $dataArray = [
            "nombreMetodoCompra" => $nombreMetodoCompra,
            "activo" => "S" 
       ];           
        //$dataArray = buildArray($_POST);      
        echo $MetodoCompraModel->insertMetodoCompra($dataArray);        
    break;
    
    case "update":
        $dataArray = buildArrayUpdate($_POST, "idMetodoCompra");
        $idValuesArray = ["idField" => "idMetodoCompra", "idValue" => $idMetodoCompra];
        echo $MetodoCompraModel->updateMetodoCompra($dataArray, $idValuesArray);
    break;
    
    case "delete":
        $idValuesArray = ["idField" => "idMetodoCompra", "idValue" => $idMetodoCompra];
        echo $MetodoCompraModel->deleteMetodoCompra($idValuesArray);
    break;

    case "selectTable":
        $tables = "metodoscompras";
        $fields = "*";
        $where  = "";
        echo $MetodoCompraModel->selectMetodoCompra($tables, $fields, $where);
    break;

    case "selectCombo":
        $tables = "metodoscompras";
        $fields = "*";
        $where  = "";
        echo $MetodoCompraModel->selectMetodoCompra($tables, $fields, $where);
    break;

    case "selectByName":
        $tables = "metodoscompras";
        $fields = "*";
        $where  =" nombreMetodoCompra='" . $nombreMetodoCompra . "'";
        echo $MetodoCompraModel->selectMetodoCompra($tables, $fields, $where);
    break;


}


