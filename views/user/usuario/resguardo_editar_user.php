<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include '../resources/class/class.connection.php';
    include $base_dir . "/models/model.resguardo.php";
    include $base_dir . "/models/model.persona.php";

    $id = $_GET['id'];
    $idR = $_GET['idR'];
    $resguardo->getOne($id);


    if($id) { 
        $numres = str_pad($id,6,"0",STR_PAD_LEFT);
    } else {
        $ultimo = $db->field("SELECT MAX(id_resguardo) FROM resguardos");
        $numres = str_pad($ultimo + 1,6,"0",STR_PAD_LEFT);        
    }
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
                        <form action="controllers/controller.user_resguardo.php" method="post" id="form">
                            
                            
                            <div class="form-group">                               
                                    <input type="hidden" class="form-control" name="idR" value="<?=$numres?>">
                                </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group" align="left">
                                    <label>N° Resguardo</label>                               
                                    <input type="text" class="form-control" name="num_resguardo" value="<?=$numres?>" readonly>
                                </div>
                            </div>
                        </div>
                           

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group" align="left">
                                    <label>Resguardante</label><br>
                                    <?php
                                        $persona->select($resguardo->data->id_persona);
                                    ?>
                                </div>
                            </div>
                        </div>
 
                                <br>
                                <input type="hidden" name="id" value="<?= $id ?>">
                              
                            <?php

                                if($id) {//esto esta mal  seria  if($id!=NULL) asi
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                            ?>                             

                            <a href="?page=user-resguardo" class="btn btn-dark">Regresar</a>
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
        theme:"classic"
    });
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>