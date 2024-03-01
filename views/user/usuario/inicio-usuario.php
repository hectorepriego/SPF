<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php include $templates_header_user ?>
    <body>
<?php include $templates_navbar_user ?>
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12"><br>
                <img src="resources/img/logo.png" class="img-fluid" alt width="300" height="200"><br><br>
           
                <h3>Bienvenido <?= $_SESSION['usuario']->nombre_completo?></h3>
                <h4 class="card-title">Cuentas con credenciales de: USUARIO</h4>

            </div>
        </div>
    </div>
             
<?php include $templates_footer_user ?>