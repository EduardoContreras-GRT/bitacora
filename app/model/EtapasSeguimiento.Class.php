<?php
include_once dirname(__FILE__) . '/../lib/connect/Connect.php';

class EtapasSeguimientoModel{

   
    private $table = "etapasseguimiento";
    private $data = "";
    private $fields = "";
    private $where = "";
    private $idValues = "";
    public $Connection = "";

    public function _construct (){
        
    }

    public function insertEtapasSeguimiento($data = []){
        $this->data = $data;
        $dataArray = ["table" => $this->table, "data" => $this->data, "pk" => "idEtapaSeguimiento"];
        $Connection = new Connect();
        return $Connection->insert($dataArray);
    }

    public function updateEtapasSeguimiento($data = [], $idValues = []){
        $this->data = $data;
        $this->idValues = $idValues;
        $dataArray = ["table" => $this->table, "idValues" => $this->idValues ,"data" => $this->data];
        $Connection = new Connect();
        return $Connection->update($dataArray);
    }

    public function deleteEtapasSeguimiento($idValues = []){      
        $this->idValues = $idValues;
        $dataArray = ["table" => $this->table, "idValues" => $this->idValues];
        $Connection = new Connect();
        return $Connection->delete($dataArray);
    }
    public function selectEtapasSeguimiento($tables = "", $fields = "", $where = ""){
        $this->table = $tables;
        $this->fields = $fields;
        $this->where = $where;

        $dataArray = ["table" => $this->table, "fields" => $this->fields, "where" => $this->where];
        $Connection = new Connect();
        return $Connection->select($dataArray);

    }

}