<?php
    session_start();
    include_once("../sessiones.php");
?>
<?php require "../estructura/header.php" ?>

  <!-- Navbar -->
<?php require "../estructura/navbar.php" ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php require "../estructura/sidebar.php" ?>
  <!-- /.sidebar -->

<?php 
    include_once("../conexion/db_conexion.php");
?>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">Nuevo Pedido</h5>
          </div>
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h3 class="card-title">Cliente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body ">    
                            <section class="content">
                            <form action="" name="">     
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Rif</label>
                                        <div class="form-group">
                                            <select class=" form-control-sm select2" name="rif" id="rif" onChange="buscar_clientes();" style="width: 100%;">
                                                <option selected="selected">...</option>
                                                <?php
                                                    $sql_emp = "select CCLIENTE from TCCCLIENTES where CEMPRESA = '8'";
                                                    $stid_emp= oci_parse($conexion, $sql_emp);
                                                    oci_execute($stid_emp);	
                                                    while ($rowEmp = oci_fetch_assoc($stid_emp))
                                                    {
                                                        echo "<option value=\"".$rowEmp['CCLIENTE']."\">".utf8_encode($rowEmp['CCLIENTE'])."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputEmail3">Nombre</label>
                                        <div class="form-group">
                                            <input type="email" disabled  class="form-control form-control-sm " id="nombre" placeholder="Nombre">
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <label for="inputEmail3">Email</label>
                                        <div class="form-group">
                                            <input type="email" disabled  class="form-control form-control-sm" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail3">Telefonos</label>
                                        <div class="form-group">
                                            <input type="email" disabled  class="form-control form-control-sm" id="telefono" placeholder="Telefonos">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="inputEmail3">Direccion</label>
                                        <div class="form-group">
                                            <input type="email" disabled  class="form-control form-control-sm" id="direccion" placeholder="Direccion">
                                        </div>
                                    </div>
                                </div>    
                            </section>  
                        </div>
                    </div>
                </div>
          <!-- /.col-md-6 -->
            </div>
         <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h3 class="card-title">Productos</h3>
                            <div class="card-tools">
                                <button type="button"  class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class=card-body>    
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Codigo</label>
                                        <div class="form-group">
                                            <select class="form-control form-control-sm select2" name="codigopro" id="codigopro" onChange="buscar_producto();" style="width: 100%;">
                                                <option value = "0" selected="selected"></option>
                                                    <?php
                                                        $sql_pdt = "select CREPUESTO from RE_EXISTENCIAS where CDEPARTAMENTO in ('7F', '7G', '8F')";
                                                        $stid_pdt= oci_parse($conexion,$sql_pdt);
                                                        oci_execute($stid_pdt);	
                                                        while ($rowpdt = oci_fetch_assoc($stid_pdt))
                                                        {
                                                            echo "<option value=\"".$rowpdt['CREPUESTO']."\">".utf8_encode($rowpdt['CREPUESTO'])."</option>";
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputEmail3">Descripcion</label>
                                        <div class="form-group">
                                            <input type="text" disabled class="form-control form-control-sm" id="descripcion" placeholder="Nombre del Producto">
                                        </div>
                                    </div>  
                                    <div class="col-md-2">
                                        <label for="inputEmail3">Existencia</label>
                                        <div class="form-group">
                                            <input type="text" disabled class="form-control form-control-sm" id="existencia" placeholder="00">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputEmail3">BPVP</label>
                                        <div class="form-group">
                                            <input type="text" disabled class="form-control form-control-sm" id="costo" placeholder="00000.00">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputEmail3">Cantidad</label>
                                        <div class="form-group">
                                            <input type="text" class=" validanumericos form-control form-control-sm " id="cantidad" placeholder="00">
                                        </div>
                                    </div>
                                    <div class="col-md-3 offset-md-7" style="margin-top:30.5px">
                                        <div class="form-group">    
                                            <div id="agregarpro" name="agregarpro" onClick="alerta();" class="btn btn-primary btn-block">Agregar</div>
                                        </div>
                                    </div>
                                </div>
                            </section> 
                            </form>
                        </div>
                    </div>
                </div>
                
          <!-- /.col-md-6 -->
            </div>
         <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Lista</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body table-responsive col-md-12">
                            <table id="listaproduct" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <td>Codigo</td>
                                        <td>Descripcion</td>
                                        <td>Exist</td>
                                        <td>Cant</td>
                                        <td>BPVP</td>
                                        <td>Total</td>
                                        <td>Acción</td>
                                    </tr>
                                </thead>
                            </table>
                        </div> 
                        <div class=" col-sm-12 col-md-4 align-self-end card-body p-4 pt-0">
                            <table class="table table-sm col-md-12">
                                <tbody>
                                    <tr>
                                        <td><strong>Sub Total:</strong></td>
                                        <td>323.000</td>
                                    </tr>
                                    <tr>
                                    <td><strong>Exento:</strong></td>
                                        <td>323.000</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Descuento:</strong></td>
                                        <td>323.000</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Iva:</strong></td>
                                        <td>323.000</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total:</strong></td>
                                        <td>323.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3 align-self-center" >
                            <div class="form-group">    
                                <button type="submit" class="btn btn-success btn-block">Guardar Pedido</button>
                            </div>
                        </div>
                    </div>
                </div>
          <!-- /.col-md-6 -->
            </div>
         <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php require "../estructura/footer.php" ?>
