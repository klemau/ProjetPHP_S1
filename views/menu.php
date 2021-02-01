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
</ul>