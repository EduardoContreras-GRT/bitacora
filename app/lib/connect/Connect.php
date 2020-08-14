<?php

date_default_timezone_set("America/Mexico_City");

class Connect {

    private $host = "";
    private $usr = "";
    private $pwd = "";
    private $db = "";
    private $port = "";
    public $link;

    public function __construct() {        
        $data = file_get_contents(dirname(__FILE__) . "/connectParams.json");
        $param = json_decode($data, true);
        if ($param != "") {
            $sae = $param[0]["sae-local"];
            $this->host = $sae["host"];
            $this->usr = $sae["user"];
            $this->pwd = $sae["password"];
            $this->db = $sae["database"];
            $this->port = $sae["port"];

            $this->link = mysqli_connect($this->host,  $this->usr , $this->pwd, $this->db, $this->port);

            if (!$this->link) {
                die("Error No: " . mysqli_errno() . "<br/> Description: " . mysqli_error());
            }
        }
   } 

    public function insert($data) {

        if ($data != "") {
            $sql = "INSERT INTO ";
            $table = $data["table"];
            $dataQuery = $data["data"];
            $pk = $data["pk"];
            $fields = "";
            $values = "";

            foreach ($dataQuery as $key => $value) {

                if($value != "null"){
                    $fields .= trim($key) . ",";
                    $values .= "'" . trim($value) . "',";
                }               
            }
            $sql .= $table . "(" . substr($fields, 0, -1) . ", FechaRegistro) VALUES (" . substr($values, 0, -1) . ",'" . date('Y-m-d H:i:s') . "')";
            //$sql .= $table . "(" . substr($fields, 0, -1) . ") VALUES (" . substr($values, 0, -1) . ")";
            $query = mysqli_query($this->link, $sql);
            if(!mysqli_error($this->link)){

               $data = [
                    "table" => $data["table"],
                    "fields" => "*",
                    "where" => $pk . " = " . mysqli_insert_id($this->link)
                ];

               return $this->select($data);
            }else {
                $result = "{"; 
                $result .= '"status":"fail",';
                $result .= '"message":"' . mysqli_error($this->link) . '",';
                $result .= '"ErrorNo":"' . mysqli_errno($this->link) . '"';
                $result .= "}";
                return $result;
            }
        }
    }

    public function update($data) {

        if ($data != "") {
            $sql = "UPDATE ";
            $table = $data["table"];
            $dataId = $data["idValues"];
            $dataParams = $data["data"];
            $values = "";
            foreach ($dataParams as $key => $value) {                
                if($value != "null"){
                    $values .= trim($key) . " = '" . trim($value) . "',";
                }
            }
            $sql .= $table . " SET " . substr($values, 0, -1)  . " WHERE " . $dataId["idField"] . " = '" . $dataId["idValue"] . "'";
            $query = mysqli_query($this->link, $sql);         

            if(!mysqli_error($this->link)){
                $data = [
                     "table" => $data["table"],
                     "fields" => "*",
                     "where" => $dataId["idField"] . " = " . $dataId["idValue"]
                 ];
                return $this->select($data);
             }else {
                $result = "{"; 
                $result .= '"status":"fail",';
                $result .= '"message":"' . mysqli_error($this->link) . '",';
                $result .= '"ErrorNo":"' . mysqli_errno($this->link) . '"';
                $result .= "}";
                return $result;
             }

        }
    }

    public function delete($data) {
        if ($data != "") {
            $sql = "UPDATE ";
            $table = $data["table"];
            $dataId = $data["idValues"];
            $sql .= $table . " SET Activo = 'N' WHERE " . $dataId["idField"] . " = '" . $dataId["idValue"] . "'";
            $query = mysqli_query($this->link, $sql);          
            $result = "{"; 
            if(!mysqli_error($this->link)){
                $result .= '"status":"ok",';
                $result .= '"message":"Deleted"';
            } else {
                $result .= '"status":"fail",';
                $result .= '"message":"' . mysqli_error($this->link) . '",';
                $result .= '"ErrorNo":"' . mysqli_errno($this->link) . '"';
            }

            $result .= "}";

            return $result;
        }
    }

    public function select($data) {
        if ($data != "") {
            $sql = "SELECT ";
            $table = $data["table"];
            $fields = $data["fields"];
            $where = $data["where"];

            $sql .= $fields . " FROM " . $table;
            if ($where != "") {
                $sql .= " WHERE " . $where;
            }          
            $query = mysqli_query($this->link, $sql);
            $result = "{";
            if(!mysqli_error($this->link)){
                $num = 0;
                $resultData = "";
                while($array = mysqli_fetch_array($query, MYSQLI_ASSOC)){                                       
                    $num =  $num + 1;
                    $resultData .= "{";
                    foreach($array as $field => $value){                                             
                        $resultData .= '"' . $field .'": "'.$value.'",';                         
                    }   
                    $resultData = substr($resultData, 0, -1);
                    $resultData .= "},";                                
                }
                $result .= '"status":"ok",';
                $result .= '"message":"success",';
                $result .= '"total":"' . $num . '",';
                $result .= '"data":[' . substr($resultData, 0, -1) . ']';

            }else {
                $result .= '"status":"fail",';
                $result .= '"message":"' . mysqli_error($this->link) . '",';
                $result .= '"ErrorNo":"' . mysqli_errno($this->link) . '"';                
            }
            $result .= "}";

            return $result;

        }
    }

}