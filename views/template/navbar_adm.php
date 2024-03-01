<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

$idpa = $_SESSION['usuario']->id_usuario;
?>

<nav class="navbar navbar-expand-lg navbar-dark" style= "background:black">

    <a class="navbar-brand" href="?page=adm-inicio"><i class="fas fa-home"></i> SPF</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="?page=adm-incidencia"><i class="fab fa-gripfire"></i> Incidencias</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?page=adm-documento"><i class="fas fa-file-alt"></i> Documentos</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?page=adm-articulo"><i class="fas fa-dolly-flatbed"></i> Inventario</a>
            </li>
              
            <li class="nav-item">
                <a class="nav-link" href="?page=adm-resguardo"><i class="fas fa-people-carry"></i> Resguardos</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?page=adm-mis_resguardos"><i class="fas fa-box-open"></i> Mis resguardos</a>
            </li>

                 <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown"><i class="fas fa-server"></i> Catalogos</a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="?page=adm-usuario">Usuarios</a>
                <a class="dropdown-item" href="?page=adm-puesto">Puestos</a>
                <a class="dropdown-item" href="?page=adm-departamento">Departamentos</a>
                <a class="dropdown-item" href="?page=adm-extension">Extensiones</a>
                <a class="dropdown-item" href="?page=adm-categoria">Categorias</a>
                <a class="dropdown-item" href="?page=adm-marca">Marcas</a>
                <a class="dropdown-item" href="?page=adm-estatu">Estatus</a>
                </li>

             <li class="nav-item">
                <a class="nav-link" href="?page=adm-persona"><i class="fas fa-users"></i> Personal</a>
            </li>
        </ul>


        <span class="navbar-text"><i class="fas fa-user"></i> Bienvenido <?= $_SESSION['usuario']->nombre?></span>
        <a href="controllers/controller.logout.php" class="btn btn-outline-info my-0 ml-2 sm-0">Salir</a>
    </div>
</nav>  