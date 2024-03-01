<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include $base_dir . "/models/model.estatu.php";
    $id = $_GET['id'];
    $estatu->getOne($id);
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
                        <form action="controllers/controller.estatu.php" method="post" id="form">
                            
                            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group"  align="left">
                                <label>Estatus</label>                               
                                <input type="text" class="form-control" name="estatu" value="<?= $estatu->data->estatus?>" required>
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

                            <a href="?page=adm-estatu" class="btn btn-dark">Regresar</a>
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