<?php
//Validamos si existe realmente una sesión activa o no 
//echo $_SESSION['autenticado']."  ".$_SESSION['usr_login_bd'];
if($_SESSION['autenticado']!="connect_true")
{ 
   //si no está logueado lo envío a la página de autentificación.
  session_unset();
  session_destroy();
  header("Location: http://localhost/aplicacion/login.php"); 
}
?>