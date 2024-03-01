<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include $base_dir . "/models/model.usuario.php";
    include $base_dir . "/models/model.rol.php";
    include $base_dir . "/models/model.persona.php";
    $id = $_GET['id'];
    $usuario->getOne($id);
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
                        <form action="controllers/controller.usuario.php" method="post" id="form">
                            
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group"  align="left">
                                <label>Persona</label><br>
                                <?php
                                $persona->select($usuario->data->id_persona);
                                ?>
                            </div>
                            </div>

                            <div class="col-md-3">
                            <div class="form-group"  align="left">
                                <label>Rol</label>       
                                <?php
                                $rol->select($usuario->data->id_rol);
                                ?>
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6"> 
                            <div class="form-group" align="left">
                                <label>Correo</label>
                                <input type="email" class="form-control" name="email" value="<?= $usuario->data->email?>" required> 

                            </div>
                            </div>

                            <div class="col-md-6"> 
                            <div class="form-group" align="left">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="contraseña" value="<?= $usuario->data->contraseña?>" required>
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
                            <a href="?page=adm-usuario" class="btn btn-dark">Regresar</a>
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
        theme:"classic"
    });
});

</script>