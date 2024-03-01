<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->id_rol<>1) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.incidencia.php";?>
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
                 <form class="form-inline mt-3 mt-md-0" action="?page=adm-incidencia" method="post">
                        <input class="form-control form-control-sm   col-sm-8 mr-sm-3" type="text" placeholder="Buscar" aria-label="Buscar" value="<?=$inciden?>" name="Buscar">
                        <button class="btn btn-sm btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
            </div>
        <!--Mitad de la barra lado Derecho 1/2-->
            <div class="col-md-1 col-sm-1 card-header" align="left">
                <div class="form-group">
                        <a class="btn btn-sm btn-primary" href='?page=adm-incidencia-editar'>Nuevo</a>
                   </div>
            </div>
    <!--Termino de la barra de componentes-->
    <?php $inciden=$_POST["Buscar"]?>
    

                    <div class="card-body">
                        <h5 style="text-align:center">Listado de Incidencias</h5>
                        <table class="table table-striped table table-sm" id="myTable">
                        <style>
                            table, tr, th, td{
                                font-size: 2.1vh;
                            }    
                        </style>
                            <thead>
                            <tr>
                                <th>Asunto</th>
                                <th>Departamento</th>
                                <th>Fecha y Hora</th>
                                <th>Usuario</th>

                            </tr>
                            </thead>
                            <tbody id="Searchincidencia">
                             <?php

                            if($inciden){
                                $incidencia->getWhere("asunto LIKE '%{$inciden}%' OR departamento LIKE '%{$inciden}%' OR fecha_hora LIKE '%{$inciden}%' OR nombre_completo LIKE '%{$inciden}%'"); 
                             //echo "filtro"        
                            }
                            else{
                                $incidencia->getAll();
                            }
                            while ($row = $incidencia->next()) {
                                echo "<tr>";
                                echo "<td>$row->asunto</td>";
                                echo "<td>$row->departamento</td>";
                                echo "<td>$row->fecha_hora</td>";
                                echo "<td>$row->nombre_completo</td>";
                                
                            ;
                                echo "<td>
                                    <a href='?page=adm-incidencia-editar&id=$row->id_incidencias'class='fas fa-edit'></a>
                                </td>";

                                echo "<td> 
                                <a href='?page=adm-incidencia-ver&id=$row->id_incidencias'class='linkborrar fas fa-eye'></a>
                                </td>";

                                echo "<td>
                                     <a href='?page=open-pdf-incidencia&id=$row->id_incidencias'target='_blank'class='linkborrar far fa-file-pdf'></a>
                                </td>";

                                echo "<td> 
                                <a href=$row->id_incidencias' data-toggle='modal' data-target='#deleteModal ' class='linkborrar fas fa-trash-alt'></a>        
                                </td>";
                                
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                             <!--Funcion del Buscador-->
                        <script> 
                            $(document).ready(function(){
                              $("#buscar").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#Searchincidencia tr").filter(function() {
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
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Incidencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.incidencia.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar esta Incidencia?</h3>
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