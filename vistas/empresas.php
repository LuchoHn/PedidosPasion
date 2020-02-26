
<?php
    session_start();
    include_once("../sessiones.php");
//echo $_SESSION['usr_login_bd'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Pedidos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../sources/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../sources/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../sources/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../sources/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../sources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../sources/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../sources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../sources/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../sources/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">    
        <a href=""><b>Sistema</b>Pedidos</a>
    </div>
    <!-- Main content -->
    <form name="form" action="home.php" method="post">
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Seleccione Empresa</label>
                                <div class="form-group">
                                    <select class="form-control select2" id="empresa"  style="width: 100%;">
                                        <option value="0"></option>
                                        <?PHP  
                                       
                                            include_once("../conexion/db_conexion.php");

                                            $sql_emp = "select CCODIGOEMPRESA,XNOMBREEMPRESA from TEMPRESA where CCODIGOEMPRESA ='8'  ORDER BY XNOMBREEMPRESA";
                                            $stid_emp= oci_parse($conexion, $sql_emp);
                                            $success = oci_execute($stid_emp);	
                                            while ($rowEmp = oci_fetch_assoc($stid_emp)){
                                                $nombreempresa=$rowEmp['XNOMBREEMPRESA'];
                                                echo "<option value=\"".$rowEmp['CCODIGOEMPRESA']."\">".utf8_encode($nombreempresa)."</option>";
                                                $_SESSION['nombreemp']= $nombreempresa;
                                                
                                            }
                                        ?>    
                                    </select>
                                </div>
                            </div>    
                            <div class="col-md-12">
                                <label>Seleccione Departamento</label>
                                <div class="form-group">
                                    <select class="form-control select2" id="departamento" style="width: 100%;"> 
                                        <option value="0"></option>
                                    </select>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>   
        </section>  
        <div class="col-12">
            <button type="submit" id="enviaremp"  class="btn btn-primary btn-block">Enviar</button>
        </div>
    </form>
</div>
<!-- jQuery -->
<script src="../sources/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../sources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../sources/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../sources/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../sources/plugins/moment/moment.min.js"></script>
<script src="../sources/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../sources/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../sources/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../sources/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../sources/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="../sources/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../sources/dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
<script src="../sources/funciones.js"></script>
</body>
</html>
