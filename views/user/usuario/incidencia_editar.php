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
    <?php include $templates_header_adm ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.incidencia.php" method="post" id="form">
                                                        
                            <div class="form-group">
                                <label>Asunto</label>                               
                                <input type="text" class="form-control" name="asunto" value="<?= $incidencia->data->asunto?>">
                            </div>

                            <div class="form-group">
                                <label>Descripcion</label>
                                <textarea type="text" class="form-control" name="descripcion" rows="3" value="<?= $incidencia->data->descripcion?>"><?php echo $incidencia->data->descripcion?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Solucion</label>
                                <textarea type="text" class="form-control" name="solucion" rows="3" value="<?= $incidencia->data->solucion?>"><?php echo $incidencia->data->solucion?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Departamento</label><br>
                                <?php
                                    $departamento->select($incidencia->data->id_departamento);
                                ?>
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

                            <a href="?page=adm-incidencia" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">

                        </form>
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
        theme: "classic"
    });
});
</script>