<link rel="shortcut icon" href="../public/img/fav-icon.ico" type="image/x-icon">
<link href="../public/css/personalized.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-color-custom">
  <div class="container-fluid">
    <div class="">
    <a class="navbar-brand" href="#">
      <img class="h-icon-custom mx-0 mt-n2" src="../public/img/icon.png">
    </a>
    </div>
    <button class="navbar-toggler px-0 mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="container-fluid mx-0 my-2 px-0 d-flex" action="../view/search.php" method="POST">
        <input class="form-control me-1" type="search" placeholder="Pesquisar..." aria-label="Search">
        <button class="btn btn-light me-3" type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search mb-1" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
        </button>
      </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item pe-3">
          <a class="nav-link text-light font-weight-bold" aria-current="page" href="help.php" target="_blank">Ajuda</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link text-light font-weight-bold" href="sandbox.php" target="_blank">Sobre</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['user'] ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item text-dark font-weight-bold" href="#">Perfil</a></li>
            <li><a class="dropdown-item text-dark font-weight-bold" href="../actions/logout.php">Sair</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>