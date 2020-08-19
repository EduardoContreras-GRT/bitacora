<?php
include_once dirname(__FILE__) . '/../lib/connect/Connect.php';

class FuentesLeadModel{

   
    private $table = "fuenteslead";
    private $data = "";
    private $fields = "";
    private $where = "";
    private $idValues = "";
    public $Connection = "";

    public function _construct (){
        
    }

    public function insertFuentesLead($data = []){
        $this->data = $data;
        $dataArray = ["table" => $this->table, "data" => $this->data, "pk" => "idFuenteLead"];
        $Connection = new Connect();
        return $Connection->insert($dataArray);
    }

    public function updateFuentesLead($data = [], $idValues = []){
        $this->data = $data;
        $this->idValues = $idValues;
        $dataArray = ["table" => $this->table, "idValues" => $this->idValues ,"data" => $this->data];
        $Connection = new Connect();
        return $Connection->update($dataArray);
    }

    public function deleteFuentesLead($idValues = []){      
        $this->idValues = $idValues;
        $dataArray = ["table" => $this->table, "idValues" => $this->idValues];
        $Connection = new Connect();
        return $Connection->delete($dataArray);
    }
    public function selectFuentesLead($tables = "", $fields = "", $where = ""){
        $this->table = $tables;
        $this->fields = $fields;
        $this->where = $where;

        $dataArray = ["table" => $this->table, "fields" => $this->fields, "where" => $this->where];
        $Connection = new Connect();
        return $Connection->select($dataArray);

    }

}