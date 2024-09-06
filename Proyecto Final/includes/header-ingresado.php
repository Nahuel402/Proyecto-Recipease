
<nav class="navbar navbar-expand-lg bg-body-tertiary header-bot">
  <div class="container-fluid">
      <a class="navbar-brand" ><img src="https://images.vexels.com/media/users/3/235848/isolated/preview/4b62529b242dcef2dbc6719899ecdd6e-chefs-kitchen-hat.png" alt="Carrito" width="40" height="40">RecipeEase</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <?php 
            if (isset($imagen)) {
              echo"
              <img src='$imagen' >";
            }
            echo"
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
              <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                $nombre
                </a>";
              ?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search" action="../base_de_datos/CerrarSession.php">
          <button class="btn btn-outline-success" type="submit">Cerrar Session</button>
        </form>
      </div>
  </div>
</nav>