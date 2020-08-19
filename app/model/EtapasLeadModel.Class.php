<?php
include_once dirname(__FILE__) . '/../lib/connect/Connect.php';

class EtapasLeadModel{

   
    private $table = "etapaslead";
    private $data = "";
    private $fields = "";
    private $where = "";
    private $idValues = "";
    public $Connection = "";

    public function _construct (){
        
    }

    public function insertEtapasLead($data = []){
        $this->data = $data;
        $dataArray = ["table" => $this->table, "data" => $this->data, "pk" => "idEtapaLead"];
        $Connection = new Connect();
        return $Connection->insert($dataArray);
    }

    public function updateEtapasLead($data = [], $idValues = []){
        $this->data = $data;
        $this->idValues = $idValues;
        $dataArray = ["table" => $this->table, "idValues" => $this->idValues ,"data" => $this->data];
        $Connection = new Connect();
        return $Connection->update($dataArray);
    }

    public function deleteEtapasLead($idValues = []){      
        $this->idValues = $idValues;
        $dataArray = ["table" => $this->table, "idValues" => $this->idValues];
        $Connection = new Connect();
        return $Connection->delete($dataArray);
    }
    public function selectEtapasLead($tables = "", $fields = "", $where = ""){
        $this->table = $tables;
        $this->fields = $fields;
        $this->where = $where;

        $dataArray = ["table" => $this->table, "fields" => $this->fields, "where" => $this->where];
        $Connection = new Connect();
        return $Connection->select($dataArray);

    }

}