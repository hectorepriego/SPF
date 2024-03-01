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
    <div class="container">
        <div class="row">
            <div class="col-lg-12" align="left">
                <div class="card">
                    <div class="card-body">
                           
                            <h4 style="text-align:center">Informacion del Articulo</h4>
                            &nbsp;

                <div class="container">
                  <div class="row">
                    <div class="col-1">
                        <!--Espacio Vacio-->
                    </div>
                    <div class="col-4">

                        <style>
                           label
                           {
                            font-size: 2.2vh;
                            }
                        </style>
                            
                        <div class="form-group" align="right">
                            <label><b>Articulo:</b></label>
                        </div>
                        
                        <div class="form-group" align="right">
                            <label><b>Inventario Interno:</b></label>
                        </div>

                        <div class="form-group" align="right">
                            <label><b>Inventario Externo:</b></label>  
                        </div>

                        <div class="form-group" align="right">
                            <label><b>No.Serie:</b></label>
                        </div>

                        <div class="form-group" align="right">
                            <label><b>Modelo:</b></label> 
                        </div>

                        <div class="form-group" align="right">
                            <label><b>Ip address:</b></label> 
                        </div>
                    
                        <div class="form-group" align="right">
                            <label><b>Mac address:</b></label>
                        </div>

                        <div class="form-group" align="right">
                            <label><b>Ubicacion:</b></label>
                        </div>

                        <div class="form-group" align="right">
                            <label><b>Estatus:</b></label>
                        </div>

                        <div class="form-group" align="right">
                            <label><b>Marca:</b></label>
                        </div>

                        <div class="form-group" align="right">
                            <label><b>Categoria:</b></label>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="form-group text">
                            <input type="text" class="form-control form-control-sm" name="nombre_articulo" value="<?= $articulo->data->nombre_articulo?>"readonly>
                        </div>

                        <div class="form-group">                                
                            <input type="text" class="form-control form-control-sm" name="inv_interno" onKeyUp="this.value=this.value.toUpperCase();" value="<?= $articulo->data->inv_interno?>"readonly>
                        </div>

                        <div class="form-group">                              
                            <input type="text" class="form-control form-control-sm" name="inv_externo" onKeyUp="this.value=this.value.toUpperCase();" value="<?= $articulo->data->inv_externo?>"readonly>
                        </div>

                        <div class="form-group">                                
                            <input type="text" class="form-control form-control-sm" name="num_serie" onKeyUp="this.value=this.value.toUpperCase();" value="<?= $articulo->data->num_serie?>"readonly>
                        </div>

                        <div class="form-group">                               
                            <input type="text" class="form-control form-control-sm" name="modelo" value="<?= $articulo->data->modelo?>"readonly>
                        </div>

                        <div class="form-group">                               
                            <input type="text" class="form-control form-control-sm" name="ip_address" value="<?= $articulo->data->ip_address?>"readonly>
                        </div>

                        <div class="form-group">                                
                            <input type="text" class="form-control form-control-sm" name="mac_address" value="<?= $articulo->data->mac_address?>"readonly>
                        </div>

                        <div class="form-group">                              
                            <input type="text" class="form-control form-control-sm" name="ubicacion" value="<?php echo $articulo->data->ubicacion?>"readonly>
                        </div>

                        <div class="form-group">                              
                            <input type="text" class="form-control form-control-sm" name="estatu" value="<?php echo $articulo->data->estatus?>"readonly>
                        </div>

                        <div class="form-group">                              
                            <input type="text" class="form-control form-control-sm" name="marca" value="<?php echo $articulo->data->marca?>"readonly>
                        </div>

                        <div class="form-group">                              
                            <input type="text" class="form-control form-control-sm" name="categoria" value="<?php echo $articulo->data->categoria?>"readonly>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <!--Espacio Vacio-->
                    </div>
                  </div>
                </div>

                            <input type="hidden" name="id" value="<?= $id ?>">
                            <?php
                                if($id) {
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                            ?>                            
                            <a href="?page=user-articulo" class="btn btn-dark btn-sm">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include $templates_footer_user ?>

<script> 
$(document). ready(function(){
    $('.js-example-theme-single').select2({
        theme: "classic"
    });

});
</script>