<?php 
	include('../model/LoginModel.php');
	$LoginModel= new LoginModel;
	$action = $_POST["action"];
	$user=trim($_POST['usuario']);
	$psw=trim($_POST['password']);

	switch($action){

	    case "serchUser":
	        $tables = "usuario";
	        $fields = " Nombre, IdUsuarios";
	        $where  = " Usuario ='" . $user . "' AND PasswordEncrip='" . sha1($psw) . "' AND Activo='S' ";
			$var = json_decode($LoginModel->serchUser($tables, $fields, $where), true);		
	        $var2=$var['data'];
	        if($var['total'] != "0"){
				$msg="Usuario encontrado";			
				session_start();
				//var_dump($var2);
				$_SESSION["user"] = $var2[0]['IdUsuarios'];
				$_SESSION["name"] = $var2[0]['Nombre'];
				print "<meta http-equiv='refresh' content='0;url=../main.php'>";
			}else{

				$msg="Usuario y/o contraseña incorrectos favor de verificar";
				print "<meta http-equiv='refresh' content='0;url=../../index.php?msg=" . $msg . "'>";		
			}   
	    break;

	}
	
?>