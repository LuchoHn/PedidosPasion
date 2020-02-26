
<?php 
    include_once("../conexion/db_conexion.php");

    //foreach para saber que trae post
    /*foreach($_POST as $campo => $valor){
        echo "<br />- ". $campo ." = ". $valor;
    }*/
    if (isset($_POST['form-enviar'])) {
        if (isset($_POST['form-username'])){
            $usuario=strtoupper(trim($_POST['form-username']));
        }
        if  (isset($_POST['form-password'])){
            $passwordS=strtoupper(trim($_POST['form-password'])); 
        }

        if (!empty($usuario) and !empty($passwordS)){

            $valida=oci_parse($conexion,"declare r number; begin :r :=AVECA.VALIDA_CLAVE_PHP(:usu,:passw); commit; end; ");
            oci_bind_by_name($valida, ":usu",$usuario,15,SQLT_CHR);
            oci_bind_by_name($valida, ":passw",$passwordS,30,SQLT_CHR);
            oci_bind_by_name($valida, ":r",$r); /// valor retornable
            oci_execute($valida);
            
            if($r==1){
                $sql_log=  "SELECT USERNAME, DU.PASSWORD,U.NOM_USUARIO,U.APE_USUARIO,U.IND_ACTIVO,RU.ID_ROLE, R.DESCRIPCION_ROLE,R.NOM_ROLE
                            FROM DBA_USERS DU,SG_USUARIO U, SG_USUDEP A, SG_ROLEUSER RU, SG_ROLE R
                            WHERE DU.USERNAME='".$usuario."'
                            AND DU.USERNAME=U.USUARIO
                            AND U.USUARIO=A.USUARIO 
                            AND A.USUARIO=RU.USUARIO
                            AND RU.ID_ROLE=R.ID_ROLE";

                $stmt = oci_parse($conexion, $sql_log); 
                oci_execute($stmt);
                $row = oci_fetch_assoc($stmt);

                if($row){	
            
                    $estatus=$row['IND_ACTIVO'];				
                    if($estatus=='S'){
                                
                        //Creamos Sesiones
                        session_start();
                        $_SESSION['usr_login_bd'] = $row['USERNAME'];
                        $_SESSION['usr_pass_bd'] = $row['PASSWORD'];
                        $_SESSION['usr_nombres'] = $row['NOM_USUARIO'];
                        $_SESSION['usr_apellidos'] = $row['APE_USUARIO'];
                        $_SESSION['usr_status'] = $row['IND_ACTIVO'];
                        $_SESSION['usr_cod_role'] = $row['ID_ROLE'];
                        $_SESSION['usr_descripcion_role'] = $row['DESCRIPCION_ROLE'];
                        $_SESSION['usr_abrev_nomb_role'] = $row['NOM_ROLE'];

                        //defino la sesión que demuestra que el usuario está autorizado 
                        $_SESSION['autenticado'] = 'connect_true';
                                
                        //session_regenerate_id(true);
                                
                        //Redirecciona a la página de inicio
                        header("Location: ../vistas/empresas.php");                  
                    }
                    else{
                            array_push($errors, "Este usuario se encuentra inactivo (a).");
                    }
                }
                else {
                    array_push($errors, "Este usuario no se encuentra registrado.");
                }           
            }
            else{	
                echo '<script>
                alert("Usuario o contraseña incorrecta", "error");
                window.location.href="../login.php";
                 </script>' ;          
            }		
                
	}
 
}

?>


