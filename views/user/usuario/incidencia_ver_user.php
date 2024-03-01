<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include $base_dir . "/models/model.incidencia.php";
    include $base_dir . "/models/model.usuario.php";
    include $base_dir . "/models/model.departamento.php";

    $id = $_GET['id'];
    $incidencia->getOne($id);
?>
<?php include $templates_header_user ?>
    <body>
<?php include $templates_navbar_user ?>
    <br>

                           
                            
                    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 style="text-align:center">Informacion de Incidencia</h4>
                            &nbsp;
                        <form action="controllers/controller.user_incidencia.php" method="post" id="form">
                                                        
                            <div class="form-group">
                                <label>Asunto</label>                               
                                <input type="text" class="form-control" name="asunto" value="<?= $incidencia->data->asunto?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Descripcion</label>
                                <textarea class="form-control" name="descripcion" rows="3" readonly><?php echo $incidencia->data->descripcion?> </textarea>
                            </div>
                            
                            
                            <div class="form-group">
                                <label>Solucion</label>
                                <textarea class="form-control" name="solucion" rows="3" readonly><?php echo $incidencia->data->solucion?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Departamento</label>                               
                                <input type="text" class="form-control" name="departamento" value="<?php echo $incidencia->data->departamento?>" readonly>
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

                            <a href="?page=user-incidencia" class="btn btn-dark">Regresar</a>


                        </form>
                    </div>
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