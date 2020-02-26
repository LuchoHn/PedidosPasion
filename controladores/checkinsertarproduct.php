<?php
    session_start();
    include_once("../conexion/db_conexion.php");

    $cod_producto=strtoupper(trim($_POST['cod_producto']));
    //echo $rif_clientes;

    //Query solo para existencia
    $sql_cog_existencia= oci_parse($conexion, "select QEXISTENCIA from RE_EXISTENCIAS WHERE CREPUESTO='$cod_producto' ");

    oci_execute( $sql_cog_existencia);
    $row_existencia = oci_fetch_assoc( $sql_cog_existencia);

    //query para denominacion y costo
    $sql_cog_costo= oci_parse($conexion, "select XREPUESTO, BPVP from RE_REPUESTOS WHERE CREPUESTO='$cod_producto' ");

    oci_execute( $sql_cog_costo);
    $row_costo = oci_fetch_assoc( $sql_cog_costo);


    $sql_product=array();

    $sql_product['descripcion']=$row_costo['XREPUESTO'];
    $sql_product['existencia']=$row_existencia['QEXISTENCIA'];
    $sql_product['costo']=$row_costo['BPVP'];

    echo json_encode($sql_product);

    oci_close($conexion);