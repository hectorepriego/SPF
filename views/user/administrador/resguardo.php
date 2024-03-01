<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->id_rol<>1) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.resguardo.php";?>
<?php include $base_dir . "/models/model.articulo.php";?>
<?php include $templates_header_adm ?>
    <body>
<?php include $templates_navbar_adm ?>

     <!--Complemento de JQuery para el buscador-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <br>
    <div class="card-body">
        <div class="card">
            <div class="col-md-12">
                <div class="row">          
    <!--Inicio de la barra de componentes-->
            <!--Mitad de la barra lado izquierdo-->
            <div class="col-sm-8 col-md-8 card-header" align="left">
                <div class="form-group">
                </div>
            </div>
            <!--Mitad de la barra lado Derecho 1/2-->
            <div class="col-md-3 col-sm-3 card-header" align="right">
                 <form class="form-inline mt-3 mt-md-0" action="?page=adm-resguardo" method="post">
                        <input class="form-control form-control-sm   col-sm-8 mr-sm-3" type="text" placeholder="Buscar" aria-label="Buscar" value="<?=$resguard?>" name="Buscar">
                        <button class="btn btn-sm btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
            </div>
            <!--Mitad de la barra lado Derecho 1/2-->
            <div class="col-md-1 col-sm-1 card-header" align="left">
                <div class="form-group">
                    <a class="btn btn-sm btn-primary" href='?page=adm-resguardo-editar'>Nuevo</a>
                </div>
            </div>
    <!--Termino de la barra de componentes-->
    <?php $resguard=$_POST["Buscar"]?> 

                    <div class="card-body">
                        <h5 style="text-align:center">Listado de Resguardos</h5>
                        <table class="table table-striped table table-sm" id="myTable">
                            <thead>
                            <style>
                            table, tr, th, td{
                                font-size: 2.1vh;
                                }    
                            </style>
                            <tr> 
                                <th>Folio</th>
                                <th>Resguardante</th>
                                <th>Otorgante</th>
                                <th>Fecha</th>
                            </tr>
                            </thead>
                            <tbody id="Searchresguardo">
                            <?php

                            if($resguard){
                                $resguardo->getWhere("num_resguardo LIKE '%{$resguard}%' OR otorgante LIKE '%{$resguard}%' OR created_at LIKE '%{$resguard}%'"); 
                             //echo "filtro"        
                            }
                            else{
                                $resguardo->getAll();
                            }
                            while ($row = $resguardo->next()) {
                                echo "<tr>";
                                echo "<td>$row->num_resguardo</td>";
                                echo "<td>$row->nombre_completo</td>";
                                echo "<td>$row->otorgante</td>";
                                echo "<td>$row->created_at</td>";
                            ;
                                echo "<td>
                                    <a href='?page=adm-resguardo-editar&id=$row->id_resguardo'class='fas fa-edit'></a>
                                </td>";

                                echo "<td>
                                    <a href='?page=adm-resguardo-detalle&idR=$row->id_resguardo'class='fas fa-archive'></a>
                                </td>";

                                echo "<td>
                                    <a href='?page=adm-resguardo-asignado&idR=$row->id_resguardo'class='fas fa-eye'></a>
                                </td>";       

                                 echo "<td>
                                    <a href='$row->id_resguardo' data-toggle='modal' data-target='#deleteModal' class='linkborrar fas fa-trash-alt'></a>
                                </td>";
                            }
                            ?>
                            </tbody>
                        </table>
                              <!--Funcion del Buscador-->
                        <script> 
                            $(document).ready(function(){
                              $("#buscar").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#Searchresguardo tr").filter(function() {
                                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                              });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- borrar -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Resguardo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.resguardo.php" method="post" id="form2">
                            <div class="form-group">
                                <h5 class="text-danger"><b>Nota:</b> Para eliminar los resguardos debes borrar los articulos que tenga asignados.</h5>
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

<?php include $templates_footer_adm ?>