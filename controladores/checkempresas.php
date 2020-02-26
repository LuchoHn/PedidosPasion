<?php
require("../conexion/db_conexion.php");
    
    $cemprs = $_POST["cemprs"];
    
    $qdpt = "select * from TDEPARTAMENTOS where CCODIGOEMPRESA = '$cemprs'";
    $condpt = oci_parse($conexion, $qdpt);
    oci_execute($condpt);
    while ($rowdpt = oci_fetch_assoc($condpt))
    {
        echo "<option value=\"".$rowdpt['CCODIGODEPART']."\">".utf8_encode($rowdpt['XNOMBREDEPART'])."</option>";
    } 
oci_close($conexion);
?>