<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include $base_dir . "/models/model.articulo.php";
    include $base_dir . "/models/model.ubicacion.php";
    include $base_dir . "/models/model.marca.php";
    include $base_dir . "/models/model.estatu.php";
    include $base_dir . "/models/model.categoria.php";
    $id = $_GET['id'];
    $articulo->getOne($id);
?>
    <?php include $templates_header_user ?>
    <body>
<?php include $templates_navbar_user ?>
    <br>
    <div align="center" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.user_articulo.php" method="post" id="form">
                            
                         <div class="row">
                            <div class="col-md-6">
                            <div class="form-group" align="left">
                                <label>Articulo</label>                               
                                <input type="text" class="form-control" name="nombre_articulo" value="<?= $articulo->data->nombre_articulo?>" required>
                            </div>
                            </div>

                            <div class="col-md-3">
                            <div class="form-group" align="left">
                                <label>Inventario Interno</label>                               
                                <input type="text" class="form-control" name="inv_interno" onKeyUp="this.value=this.value.toUpperCase();" value="<?= $articulo->data->inv_interno?>" required>
                            </div>
                            </div>

                            <div class="col-md-3">
                            <div class="form-group" align="left">
                                <label>Inventario Externo</label>                               
                                <input type="text" class="form-control" name="inv_externo" onKeyUp="this.value=this.value.toUpperCase();" value="<?= $articulo->data->inv_externo?>">
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group" align="left">
                                <label>No.Serie</label>                               
                                <input type="text" class="form-control" name="num_serie" onKeyUp="this.value=this.value.toUpperCase();" value="<?= $articulo->data->num_serie?>" required>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group" align="left">
                                <label>Modelo</label>                               
                                <input type="text" class="form-control" name="modelo" value="<?= $articulo->data->modelo?>">
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group" align="left">
                                <label>Ip address</label>                               
                                <input type="text" class="form-control" name="ip_address" value="<?= $articulo->data->ip_address?>">
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group" align="left">
                                <label>Mac address</label>                               
                                <input type="text" class="form-control" name="mac_address" value="<?= $articulo->data->mac_address?>">
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group" align="left">
                                <label>Ubicacion</label>                               
                                <input type="text" class="form-control" name="ubicacion" value="<?= $articulo->data->ubicacion?>">
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group" align="left">
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-4">
                            <div class="form-group" align="left">
                                <label>Estatus</label><br>
                                <?php
                                    $estatu->select($articulo->data->id_estatu);
                                ?>
                            </div>
                            </div>

                            
                            <div class="col-md-4">
                            <div class="form-group" align="left">
                                <label>Marca</label><br>
                                <?php
                                    $marca->select($articulo->data->id_marca);
                                ?>
                            </div>
                            </div>

                            
                            <div class="col-md-4">
                            <div class="form-group" align="left">
                                <label>Categoria</label><br>
                                <?php
                                    $categoria->select($articulo->data->id_categoria);
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

                            <a href="?page=user-articulo" class="btn btn-dark">Regresar</a>
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