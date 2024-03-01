<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include $base_dir . "/models/model.puesto.php";
    $id = $_GET['id'];
    $puesto->getOne($id);
?>
    <?php include $templates_header_adm ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div align="center"  class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.puesto.php" method="post" id="form">
                            
                            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group"  align="left">
                                <label>Puesto</label>                               
                                <input type="text" class="form-control" name="puesto" value="<?= $puesto->data->puesto?>" required>
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

                            <a href="?page=adm-puesto" class="btn btn-dark">Regresar</a>
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