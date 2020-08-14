<?php 
	include('../Model/LoginModel.php');
	$LoginModel= new LoginModel;
	$action = $_POST["action"];
	$user=trim($_POST['usuario']);
	$psw=trim($_POST['password']);

	switch($action){

	    case "serchUser":
	        $tables = "Usuarios";
	        $fields = " User";
	        $where  = " User='" . $user . "' AND PasswordEncrip='" . sha1($psw) . "' AND Activo='S' ";
			$var = json_decode($LoginModel->serchUser($tables, $fields, $where), true);		
	        $var2=$var['data'];
	        if($var['total'] != "0"){
				$msg="Usuario encontrado";			
				session_start();	
				$_SESSION["user"] = $var2[0]['IdUsuario'];
				$_SESSION["name"] = $var2[0]['Usuario'];
				//$_SESSION["shortName"] = $var2[0]['NombreCorto'];		
				print "<meta http-equiv='refresh' content='0;url=../../index.php'>";
			}else{
				$msg="Usuario y/o contraseña incorrectos favor de verificar";
				print "<meta http-equiv='refresh' content='0;url=../../login.html?msg=" . $msg . "'>";		
			}   
	    break;

	}
	
?>