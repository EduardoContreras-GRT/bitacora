<?php 
include_once '../lib/connect/Connect.php';
	class LoginModel
	{
		private $table = "usuario";
	    private $data = "";
	    private $fields = "";
	    private $where = "";
	    private $idValues = "";
	    public $Connection = "";

	    public function _construct (){     

    	}

    	public function serchUser($tables = "", $fields = "", $where = "")
    	{
	        $this->table = $tables;
	        $this->fields = $fields;
	        $this->where = $where;
			$dataArray = ["table" => $this->table, "fields" => $this->fields, "where" => $this->where];
	        $Connection = new Connect();
	        return $Connection->select($dataArray);
    	}


		
			
	}
?>