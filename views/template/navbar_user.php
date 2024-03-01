<nav class="navbar navbar-expand-lg navbar-dark" style= "background:black">

    <a class="navbar-brand" href="?page=user-inicio"><i class="fas fa-home"></i> SPF</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="?page=user-incidencia"><i class="fab fa-gripfire"></i> Incidencias</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?page=user-documento"><i class="fas fa-file-alt"></i> Documentos</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?page=user-articulo"><i class="fas fa-dolly-flatbed"></i> Inventario</a>
            </li>
              
            <li class="nav-item">
                <a class="nav-link" href="?page=user-resguardo"><i class="fas fa-people-carry"></i> Resguardos</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?page=user-mis_resguardos"><i class="fas fa-box-open"></i> Mis resguardos</a>
            </li>

        </ul>

        <span class="navbar-text"><i class="fas fa-user"></i> Bienvenido <?= $_SESSION['usuario']->nombre?></span>
        <a href="controllers/controller.logout.php" class="btn btn-outline-info my-0 ml-2 sm-0">Salir</a>
    </div>
</nav>  