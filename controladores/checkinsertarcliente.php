<?php
    session_start();
    include_once("../conexion/db_conexion.php");

    $rif_clientes=strtoupper(trim($_POST['rif_clientes']));
    //echo $rif_clientes;
    $sql_cog_clt= oci_parse($conexion, "select XDENOMINACION,XDIRECCION,CTELEFONO1,CE_MAIL FROM TCCCLIENTES WHERE CCLIENTE='$rif_clientes' ");

    oci_execute( $sql_cog_clt);
    $row_clt = oci_fetch_assoc( $sql_cog_clt);

    $sql_clt=array();

    $sql_clt['nombre']=$row_clt['XDENOMINACION'];
    $sql_clt['direccion']=$row_clt['XDIRECCION'];
    $sql_clt['telefono']=$row_clt['CTELEFONO1'];
    $sql_clt['email']=$row_clt['CE_MAIL'];

    echo json_encode($sql_clt);

    oci_close($conexion);
?>