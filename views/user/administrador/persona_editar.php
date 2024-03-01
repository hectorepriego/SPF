<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include $base_dir . "/models/model.persona.php";
    include $base_dir . "/models/model.puesto.php";
    include $base_dir . "/models/model.departamento.php";
    include $base_dir . "/models/model.extension.php";
    $id = $_GET['id'];
    $persona->getOne($id);
?>
    <?php include $templates_header_adm ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container" align="center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="controllers/controller.persona.php" method="post" id="form">
                            
                            <div class="row">
                            <div class="col-md-4">
                            <div class="form-group" align="left">
                                <label>Nombre</label>                               
                                <input type="text" class="form-control" name="nombre" value="<?= $persona->data->nombre?>" required>
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group" align="left">
                               <label>Apellido Paterno</label>                               
                                <input type="text" class="form-control" name="apellido_paterno" value="<?= $persona->data->apellido_paterno?>" required>
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group" align="left">
                                <label>Apellido Materno</label>                               
                                <input type="text" class="form-control" name="apellido_materno" value="<?= $persona->data->apellido_materno?>" required>
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group" align="left">
                                <label>Imagen</label>  
                                <div class="custom-file mb-3">
                                  <input type="file" class="custom-file-input" id="customFile" name="img">
                                  <label class="custom-file-label" for="customFile">selecciona archivo</label>
                                </div>  
                            </div>
                            </div>
                            

                            
                            <div class="col-md-6">
                            <div class="form-group" align="left">
                                <label>Puesto</label><br>
                                <?php
                                    $puesto->select($persona->data->id_puesto);
                                ?>
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group" align="left">
                               <label>Departamento</label><br>
                                <?php
                                    $departamento->select($persona->data->id_departamento);
                                ?>
                            </div>
                            </div>


                            <div class="col-md-5">
                            <div class="form-group" align="left">
                                <label>Extension</label><br>
                                <?php
                                    $extension->select($persona->data->id_extension);
                                ?>
                            </div>
                            </div>
                         

                            <div class="col-md-1">
                            <div class="form-group"  align="center">
                                <label>Agregar</label><br>
                                <a data-toggle='modal' data-target='#agregarextension' class="btn btn-sm btn-info fas fa-plus-circle" href='?page=adm-extension-editar'></a>
                            </div>
                            </div>
                            </div>

                            <br>
                                <input type="hidden" name="id" value="<?= $id ?>">
                            <?php

                                if($id) {
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                            ?>                            


                            <a href="?page=adm-persona" class="btn btn-dark">Regresar</a>
                            <a>&nbsp</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- Modal Agregar ubicacion -->
                <div class="modal fade" id="agregarextension" tabindex="-1" role="dialog" aria-labelledby="extensionModalLabel"
                     aria-hidden="true"> 
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="extensionModalLabel">
                                Nueva Extension</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                    <div class="modal-body">
                        <form action="controllers/controller.extension_modal.php" method="post" id="form2"><br>            
                        <div class="form-group" align="left">
                            <input type="text" class="form-control" name="extension" minlength="4" maxlength="5"
                            value="<?= $extension->data->extension?>" required>
                        </div>

                        <div class="form-group" align="left">
                                <label>Departamento</label><br>
                                <?php
                                    $departamento->select($extension->data->id_departamento);
                                ?>
                        </div>
                            <input type="hidden" name="id" value="<?= $id ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include $templates_footer_adm ?>

<script> 
$(document). ready(function(){
    $('.js-example-theme-single').select2({
        theme: "classic"
    });

});
</script>