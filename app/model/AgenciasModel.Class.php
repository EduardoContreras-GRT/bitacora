<?php
include_once dirname(__FILE__) . '/../lib/connect/Connect.php';

class AgenciasModel{

   
    private $table = "agencias";
    private $data = "";
    private $fields = "";
    private $where = "";
    private $idValues = "";
    public $Connection = "";

    public function _construct (){
        
    }

    public function insertAgencias($data = []){
        $this->data = $data;
        $dataArray = ["table" => $this->table, "data" => $this->data, "pk" => "IdAgencia"];
        $Connection = new Connect();
        return $Connection->insert($dataArray);
    }

    public function updateAgencias($data = [], $idValues = []){
        $this->data = $data;
        $this->idValues = $idValues;
        $dataArray = ["table" => $this->table, "idValues" => $this->idValues ,"data" => $this->data];
        $Connection = new Connect();
       return $Connection->update($dataArray); 
       //echo ($dataArray);
     //  echo ("<script>console.log('PHP: ".$data."');<script>");
       
    }

    public function deleteAgencias($idValues = []){      
        $this->idValues = $idValues;
        $dataArray = ["table" => $this->table, "idValues" => $this->idValues];
        $Connection = new Connect();
        return $Connection->delete($dataArray);
    }
    public function selectAgencias($tables = "", $fields = "", $where = ""){
        $this->table = $tables;
        $this->fields = $fields;
        $this->where = $where;

        $dataArray = ["table" => $this->table, "fields" => $this->fields, "where" => $this->where];
        $Connection = new Connect();
        return $Connection->select($dataArray);

    }

}