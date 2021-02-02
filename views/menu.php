<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Accueil">Accueil</a>
<!--     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-2">
        <?php if(isset($_SESSION['role']) && $_SESSION['role']==2)
        {
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="/User">Utilisateurs</a>';
          echo '</li>';
        }
        ?>
          <li class="nav-item">
            <a class="nav-link" href="/Bougie">Bougies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Livre">Livres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Event">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Odeur">Odeurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Recette">Recettes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Auteur">Auteurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Collection">Collections</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Accueil/session"><?php if($_SESSION['login']==null){echo "Connexion";}else{echo $_SESSION['login']." [Déconnexion]";} ?></a>
          </li>
          <?php if(!isset($_SESSION['role']))
        {
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="/User/create">S\'inscrire</a>';
          echo '</li>';
        }
        ?>
        </ul>
    </div>
  </div>
</nav>