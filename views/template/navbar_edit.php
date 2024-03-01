<nav class="navbar navbar-expand-lg navbar-dark" style= "background:black">

    <a class="navbar-brand" href="?page=edit-inicio"><i class="fas fa-home"></i> SPF</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="?page=edit-persona"><i class="fas fa-users"></i> Personal</a>
            </li>
        </ul>
        <span class="navbar-text"><i class="fas fa-user"></i> Bienvenido <?= $_SESSION['usuario']->nombre?></span>
        <a href="controllers/controller.logout.php" class="btn btn-outline-info my-0 ml-2 sm-0">Salir</a>
    </div>
</nav>  