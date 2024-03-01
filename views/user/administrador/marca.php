<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->id_rol<>1) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.marca.php";?>
<?php include $templates_header_adm ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>

    <!--Complemento de JQuery para el buscador-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <div class="container">
        <div class="card">
            <div class="col-md-12">
                <div class="row">          
    <!--Inicio de la barra de componentes-->
            <!--Mitad de la barra lado izquierdo-->
            <div class="col-sm-6 col-md-6 card-header" align="left">
                <div class="form-group">
                </div>
            </div>
            <!--Mitad de la barra lado Derecho 1/2-->
            <div class="col-md-5 col-sm-5 card-header" align="right">
                <div class="form-group">
                    <input class= "form-control form-control-sm col-sm-6 text-left" id="buscar" type="text" placeholder="Buscar">
                </div>
            </div>
            <!--Mitad de la barra lado Derecho 1/2-->
            <div class="col-md-1 col-sm-1 card-header" align="left">
                <div class="form-group">
                   <a class="btn btn-sm btn-primary" href='?page=adm-marca-editar'>Nuevo</a> 
                </div>
            </div>
    <!--Termino de la barra de componentes-->

                    <div class="card-body">
                        <h5 style="text-align:center">Catalogo de Marcas</h5>
                        <table class="table table-striped table table-sm" id="myTable">
                            <thead>
                            <tr>
                                <th>Marcas</th>
                            </tr>
                            </thead>
                            <tbody id="Searchmarca">
                            <?php
                            $marca->getAll();
                            while ($row = $marca->next()) {
                                echo "<tr>";
                                echo "<td>$row->marca</td>";
                            ;
                                echo "<td>
                                    <a href='?page=adm-marca-editar&id=$row->id_marca'class='fas fa-edit'></a>

                                    <a href='$row->id_marca' data-toggle='modal' data-target='#deleteModal ' class='linkborrar fas fa-trash-alt'></a>
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
                                $("#Searchmarca tr").filter(function() {
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
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Marca</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.marca.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar esta Marca?</h3>
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