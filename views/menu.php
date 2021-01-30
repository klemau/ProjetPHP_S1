<?php /*echo "session :".$_SESSION['login'].".";*/ ?>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/Accueil">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/User">Utilisateurs (Admin Only)</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/Bougie">Bougies</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/Livre">Livres</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/Accueil/session"><?php if($_SESSION['login']==null){echo "Connexion";}else{echo $_SESSION['login']." [Déconnexion]";} ?></a>
  </li>
</ul>