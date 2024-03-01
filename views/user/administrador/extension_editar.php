<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include $base_dir . "/models/model.departamento.php";
    include $base_dir . "/models/model.extension.php";
    $id = $_GET['id'];
    $extension->getOne($id);
?>
    <?php include $templates_header_adm ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div align="center" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.extension.php" method="post" id="form">
                            

                            <div class="row">
                            <div class="col-md-3">
                            <div class="form-group"  align="left">
                                <label>Extension</label>
                                <input type="text" class="form-control" name="extension" minlength="3" maxlength="6"  value="<?= $extension->data->extension?>" required>
                            </div>
                            </div>
                            </div>



                            <div class="row">
                            <div class="col-md-7">
                            <div class="form-group"  align="left">
                                <label>Departamento</label>
                                <?php
                                    $departamento->select($extension->data->id_departamento);
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
                               
                            <a href="?page=adm-extension" class="btn btn-dark">Regresar</a>
                            <a>&nbsp</a>
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