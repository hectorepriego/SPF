<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->id_rol<>2) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.documento.php";?>
<?php include $templates_header_user ?>
    <body>
<?php include $templates_navbar_user ?>
    <br>


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
                 <form class="form-inline mt-3 mt-md-0" action="?page=user-documento" method="post">
                        <input class="form-control form-control-sm   col-sm-8 mr-sm-3" type="text" placeholder="Buscar" aria-label="Buscar" value="<?=$document?>" name="Buscar">
                        <button class="btn btn-sm btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
            </div>
            <!--Mitad de la barra lado Derecho 1/2-->
            <div class="col-md-1 col-sm-1 card-header" align="left">
                <div class="form-group">
                    <a class="btn btn-sm btn-primary" href='?page=user-documento-editar'>Nuevo</a>
                </div>
            </div>
    <!--Termino de la barra de componentes-->
    <?php $document=$_POST["Buscar"]?>


                <div class="card-body">
                        <h5 style="text-align:center">Listado de Documentos</h5>
                        <table class="table table-striped table table-sm" id="myTable">
                            <thead>
                        <style>
                            table, tr, th, td{
                                font-size: 2.1vh;
                            }    
                        </style>
                            <tr>
                                <th>Folio</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                                <th style="text-align:center;">Archivo</th>
                                <th>Tipo Documento</th>
                                <th>Creacion</th>
                                
                            </tr>
                            </thead>
                            <tbody id="Searchdocumentos">
                            <?php

                            if($document){
                                $documento->getWhere("(folio LIKE '%{$document}%' OR tipo_documento LIKE '%{$document}%' OR fecha_doc LIKE '%{$document}%' ) AND id_usuario = {$_SESSION['usuario']->id_usuario}"); 
                             //echo "filtro"        
                            }
                            else{
                            $documento->getDocumento();
                            }
                            while ($row = $documento->next()) {
                                echo "<tr>";
                                echo "<td>$row->folio</td>";
                                echo "<td>$row->descripcion</td>";
                                echo "<td>$row->fecha_doc</td>";
                                echo "<td style='text-align:center'><a href='resources/documentos/{$row->folio}{$row->id_tipo_documento}.pdf' class='far fa-file-pdf fa-2x' target='_blank'></a></td>";
                                echo "<td>$row->tipo_documento</td>";
                                echo "<td>$row->created_at</td>";
                                
                            ;
                                echo "<td>
                                    <a href='?page=user-documento-editar&id=$row->id_documento' class='fas fa-edit'></a>
                                </td>";
                                    
                                echo "<td> 
                                    <a href='$row->id_documento' data-toggle='modal' data-target='#deleteModal' class='linkborrar fas fa-trash-alt'></a>
                                </td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>

                        <script> 
                            $(document).ready(function(){
                              $("#buscar").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#Searchdocumentos tr").filter(function() {
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
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Documento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.user_documento.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar este Documento?</h3>
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

<?php include $templates_footer_user ?>