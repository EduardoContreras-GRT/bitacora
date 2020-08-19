<?php
include_once dirname(__FILE__) . '/../lib/connect/Connect.php';

class GuionesModel{

   
    private $table = "tiposplantillasguiones";
    private $data = "";
    private $fields = "";
    private $where = "";
    private $idValues = "";
    public $Connection = "";

    public function _construct (){
        
    }

    public function insertGuiones($data = []){
        $this->data = $data;
        $dataArray = ["table" => $this->table, "data" => $this->data, "pk" => "idTipoPlantillaGuion"];
        $Connection = new Connect();
        return $Connection->insert($dataArray);
    }

    public function updateGuiones($data = [], $idValues = []){
        $this->data = $data;
        $this->idValues = $idValues;
        $dataArray = ["table" => $this->table, "idValues" => $this->idValues ,"data" => $this->data];
        $Connection = new Connect();
        return $Connection->update($dataArray);
    }

    public function deleteGuiones($idValues = []){      
        $this->idValues = $idValues;
        $dataArray = ["table" => $this->table, "idValues" => $this->idValues];
        $Connection = new Connect();
        return $Connection->delete($dataArray);
    }
    public function selectGuiones($tables = "", $fields = "", $where = ""){
        $this->table = $tables;
        $this->fields = $fields;
        $this->where = $where;

        $dataArray = ["table" => $this->table, "fields" => $this->fields, "where" => $this->where];
        $Connection = new Connect();
        return $Connection->select($dataArray);

    }

}