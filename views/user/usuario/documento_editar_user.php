<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    //include $base_dir . "/models/model.usuario.php";
    include $base_dir . "/models/model.tipo.documento.php";
    include $base_dir . "/models/model.documento.php";
    include $base_dir . "/models/model.persona.php";
    $id = $_GET['id'];
    $documento->getOne($id);
?>
    <?php include $templates_header_user ?>
    <body>
<?php include $templates_navbar_user ?>
    <br>
    <div align="center" class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="width:900px">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="controllers/controller.user_documento.php" method="post" id="form">

                            <div class="row">
                           
                            <div class="col-md-3">
                            <div class="form-group"  align="left">
                                <label  >Folio</label>  
                                 
                                <input type="text" class="form-control" name="folio" value="<?=$documento->data->folio?>" required>
                            </div>
                            </div>

                            <div class="col-md-9">
                            <div class="form-group" align="left">
                                <label>Tipo Documento</label>
                                <?php
                                    $tipodocumento->select($documento->data->id_tipo_documento);
                                ?>

                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group" align="left">
                                <label>Descripción</label>                               
                                 <textarea type="text" class="form-control" name="descripcion" rows="3" value="<?= $documento->data->descripcion?>"><?php echo $documento->data->descripcion?></textarea>
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-8">
                            <div class="form-group" align="left">
                           
                           <label>Archivo</label>  
                                <div class="custom-file mb-3">
                                  <input type="file" class="custom-file-input" id="customFile" name="url">
                                  <label class="custom-file-label" for="customFile">selecciona archivo</label>
                                </div>
                            </div>
                            </div>

                                

                            <div class="col-md-4">
                            <div class="form-group" align="left">
                                <label>Fecha</label>                               
                                <input type="date" class="form-control" name="fecha_doc" id="fechaActual" value="<?= $documento->data->fecha_doc?>">
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

                            <a href="?page=user-documento" class="btn btn-dark">Regresar</a>
                            <a>&nbsp</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php include $templates_footer_user ?>

<script>
window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
}
</script>

<script> 
$(document). ready(function(){
    $('.js-example-theme-single').select2({
        theme: "classic"
    });

});
</script>