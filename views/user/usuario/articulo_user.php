<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->id_rol<>2) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.articulo.php";?>
<?php include $templates_header_user ?>
    <body>
<?php include $templates_navbar_user ?>
    
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
                    <a class="btn btn-sm btn-danger" href='#'>Exportar PDF</a>
                    <a>&nbsp</a>
                    <a class="btn btn-sm btn-success" href='#'>Exportar EXCEL</a>                     
                 </div>
            </div>
            <!--Mitad de la barra lado Derecho 1/2-->
            <div class="col-md-3 col-sm-3 card-header" align="right">
                 <form class="form-inline mt-3 mt-md-0" action="?page=user-articulo" method="post">
                        
                        <input class="form-control form-control-sm   col-sm-8 mr-sm-3" type="text" placeholder="Buscar" aria-label="Buscar" value="<?=$articu?>" name="Buscar">
                        <button class="btn btn-sm btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
            </div>
            <!--Mitad de la barra lado Derecho 1/2-->
            <div class="col-md-1 col-sm-1 card-header" align="left">
                <div class="form-group">
                    <a class="btn btn-sm btn-primary" href='?page=user-articulo-editar'>Nuevo</a> 
                </div>
            </div>
    <!--Termino de la barra de componentes-->
    <?php $articu=$_POST["Buscar"]?>

                 <div class="card-body">
            <h5 style="text-align:center">Listado de Articulos</h5><br>
                <table class="table table-striped table table-sm" id="myTable">
            <style>
                table, tr, td{
                    text-align: center;
                    font-size: 1.8vh;
                }
                th{
                    text-align: center;
                    font-size: 2vh;
                }    

            </style>
                    <thead>
                        <tr> 
                        <th>Articulo</th>
                        <th>Inv interno</th>
                        <th>Inv externo</th>
                        <th>Num serie</th>
                        <th>Marca</th>
                        <th>Estatus</th>
                        <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody id="Searcharticulos">
                        <?php

                        if($articu){
                            $articulo->getWhere("(nombre_articulo LIKE '%{$articu}%' OR inv_interno LIKE '%{$articu}%' OR inv_externo LIKE '%{$articu}%' OR num_serie LIKE '%{$articu}%'
                                OR marca LIKE '%{$articu}%' OR estatus LIKE '%{$articu}%' OR categoria LIKE '%{$articu}%' OR nombre_completo LIKE '%{$articu}%' OR ubicacion LIKE '%{$articu}%')AND id_usuario = {$_SESSION['usuario']->id_usuario}"); 
                         //echo "filtro"        
                        }
                        else{
                            $articulo->getArticulo('');
                        }
                            
                            while ($row = $articulo->next()) {
                            echo "<tr>";
                            echo "<td>$row->nombre_articulo</td>";
                            echo "<td>$row->inv_interno</td>";
                            echo "<td>$row->inv_externo</td>";
                            echo "<td>$row->num_serie</td>";
                            echo "<td>$row->marca</td>";
                            echo "<td>$row->estatus</td>";
                            echo "<td>$row->categoria</td>";
                            echo "<td style='display: none;'>$row->ubicacion</td>";
                            ;
                            
                            echo "<td>
                                 <a href='?page=user-articulo-editar&id=$row->id_articulo'class='fas fa-edit'></a>
                                </td>";

                            echo "<td> 
                                <a href='?page=user-articulo-ver&id=$row->id_articulo'class='linkborrar fas fa-eye'></a>
                                </td>";
                                    
                            echo "<td> 
                                <a href='$row->id_articulo' data-toggle='modal' data-target='#deleteModal' class='linkborrar fas fa-trash-alt'></a>
                                </td>";
                            echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
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
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Articulo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.user_articulo.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar este Articulo?</h3>
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

<!--Funcion del Buscador-->
        <script> 
            $(document).ready(function(){
                $("#buscar").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                $("#Searcharticulos tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
