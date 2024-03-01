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
    <div class="container" align="center">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="width:900px">
                    <div class="card-body">
                        <form action="controllers/controller.user_incidencia.php" method="post" id="form">
                            
                            <div class="row">
                            <div class="col-md-8">
                            <div class="form-group"  align="left">
                                <label>Asunto</label>                               
                                <input type="text" class="form-control" name="asunto" value="<?= $incidencia->data->asunto?>" required>
                            </div>
                            </div>
                            </div>

                            <div class="form-group"  align="left">
                                <label>Descripcion</label>
                                <textarea type="text" class="form-control" name="descripcion" rows="3" value="<?= $incidencia->data->descripcion?>" required><?php echo $incidencia->data->descripcion?></textarea>
                            </div>

                            <div class="form-group"  align="left">
                                <label>Solucion</label>
                                <textarea type="text" class="form-control" name="solucion" rows="3" value="<?= $incidencia->data->solucion?>" required><?php echo $incidencia->data->solucion?></textarea>
                            </div>
                            
                               <div class="row">
                            <div class="col-md-8">
                            <div class="form-group"  align="left">
                                <label>Departamento</label><br>
                                <?php
                                    $departamento->select($incidencia->data->id_departamento);
                                ?>
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

                            <a href="?page=user-incidencia" class="btn btn-dark">Regresar</a>
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
$(document). ready(function(){
    $('.js-example-theme-single').select2({
        theme: "classic"
    });
});
</script>