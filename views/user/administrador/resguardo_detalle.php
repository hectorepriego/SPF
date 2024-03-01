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

    
    <?php include $templates_header_adm ?>
    <body>
    <?php include $templates_navbar_adm ?>
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
                        <form action="controllers/controller.resguardo_detalle.php" method="post" id="form">   <input type="hidden" class="form-control" name="num_resguardo" value="<?=$idR?>">
                          
                                <div class="form-group" align="left">
                                    <label><b>Articulos</b></label><br>
                                <?php
                                    $articulo->select2($resguardo->data->id_estatu,7);
                                ?> 
                                <input type="hidden" name="id" value="<?= $id ?>">
                              
                            <?php

                                if($id) {//esto esta mal  seria  if($id!=NULL) asi
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                            ?>  
                                </div>
                                
                            </div>

                            <div class="col-6">
                                <div class="form-group" align="left">
                                    <br>
                                    <input type="submit" class="btn btn-sm btn-success" value="Agregar">
                                </div>    
                            </div>
                            </form>
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
                        <th style="color:white;">Nombre articulo</th>
                        <th style="color:white;">Inv interno</th>
                        <th style="color:white;">Inv externo</th>
                        <th style="color:white;">Num serie</th>
                        <th style="color:white;">Accion</th>
                        </tr>
                    </thead>
                    <tbody id="Searcharticulos">
                        <?php
                        $detalle->getWhere("fk_resguardo=$idR");
                        while ($row = $detalle->next()) {
                            echo "<tr>";
                            echo "<td>$row->nombre_articulo</td>";
                            echo "<td>$row->inv_interno</td>";
                            echo "<td>$row->inv_externo</td>";
                            echo "<td>$row->num_serie</td>";

                            ;
                            echo "<td> 
                                <a href='$row->id_resguardo_detalle' data-toggle='modal' data-target='#deleteModal' class='linkborrar fas fa-trash-alt'></a>
                                </td>";
                        }
                        ?>
                    </tbody>
                </table>
        </div>
        <center><a href="?page=adm-resguardo" class="btn btn-primary" text-align="center">Guardar</a></center>
                    </div>
                </div>
            </div>
        <br>
        <!-- Modal Borrar -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">
                        Borrar Articulo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <form action="controllers/controller.resguardo_detalle.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar este Articulo?</h3>
                                <input type="hidden" class="form-control" name="num_resguardo" value="<?=$idR?>">
                                <input id="inpborrar" type="hidden" name="id">
                                <input type="hidden" name="tipo" value="borrar">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" form="form2">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <br>
    </div>



<?php include $templates_footer_adm ?>

<script> 
$(document). ready(function(){
    $('.js-example-theme-single').select2({
        theme:"classic"
    });
});

</script>