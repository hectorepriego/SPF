<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include '../resources/class/class.connection.php';
    include $base_dir . "/models/model.resguardo_detalle.php";
    include $base_dir . "/models/model.resguardo.php";
    include $base_dir . "/models/model.articulo.php";
    $id = $_GET['id'];
    $idR = $_GET['idR'];
    $detalle->getOne($id);
    $resguardo->getOne($idR);
?>

    
    <?php include $templates_header_user ?>
    <body>
    <?php include $templates_navbar_user ?>
    <br>

    <div class="card-body">
        <div class="row">
            <div class="col-lg-12" align="left">
                <div class="card">
                    <div class="card-header">
                        <style>
                            label
                                   {
                                    font-size: 2.2vh;
                                    }
                        </style>

                        <div class="container">
                          <div class="row">

                            <div class="col-6">
                                 <div class="form-group" align="left">
                                    <label  style="font-size:20px" ><b>Resguardo de:</b></label>
                                    <label  style="font-size:20px" ><b><?= $resguardo->data->nombre_completo?></b></label><br>
                                     <?php 
                                    echo "<a class='btn btn-sm btn-danger' href='?page=open-pdf-detalle_resguardo&idR=$idR 'target='_blank'> Exportar PDF</a>";
                                     ?>
                                </div>     
                            </div>

                            <div class="col-1">
                                <div class="form-group" align="left">
                                    
                                </div>    
                            </div>
                            
                            <div class="col-5">
                                <div class="form-group" align="right">
                                     <label><b>Folio:</b></label>
                                     <label><b><?= $resguardo->data->num_resguardo?></b></label><br> 
                                      <label><b>Fecha:</b></label> 
                                    <label><b><?= $resguardo->data->created_at?></b></label>   
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="container">
                          <div class="row">
                            <div class="col-6">
                                <div class="form-group" align="left">
                                </div>    
                            </div>
                          </div>
                        </div>
                    </div>
          
        
   

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                    <div class="card-body">
                <table class= "table table table-sm table table-bordered" id="myTable">
            <style>
                table td{
                    text-align: center;
                    font-size: 2.0vh;
                }   
                table, tr, th {
                    text-align: center;
                    font-size: 2.4vh;
                }    
            </style>
                    <thead>
                        <tr bgcolor="#9D2449"> 
                        <th style="color:white;">Articulo</th>
                        <th style="color:white;">Marca</th>
                        <th style="color:white;">Serie</th>
                        <th style="color:white;">Inv interno</th>
                        <th style="color:white;">Inv externo</th>
                        
                        </tr>
                    </thead>
                    <tbody id="Searcharticulos">
                        <?php
                        $detalle->getWhere("fk_resguardo=$idR");
                        while ($row = $detalle->next()) {
                            echo "<tr>";
                            echo "<td>$row->nombre_articulo</td>";
                            echo "<td>$row->marca</td>";
                            echo "<td>$row->num_serie</td>";
                            echo "<td>$row->inv_interno</td>";
                            echo "<td>$row->inv_externo</td>";
                        }
                        ?>
                    </tbody>
                </table>
        </div>
        <center><a href="?page=user-resguardo" class="btn btn-dark" text-align="center">Regresar</a></center>
                    </div>
                </div>
            </div>
        <br>
    </div>
        </div>
        <br>
    </div>



<?php include $templates_footer_user ?>
