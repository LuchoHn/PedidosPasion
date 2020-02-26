<?php
try
{
	
	$usuario="aveca";
	$pass="aveca";
	$errors = array();
	
	$conexion = oci_connect($usuario,$pass,'EXITO');

	if(!$conexion)
	{
	   $e = oci_error();
	   trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	   exit();
	}

}
catch(Exception $e)
{
    die('Error: ' . $e->GetMessage());
}
 
?>
