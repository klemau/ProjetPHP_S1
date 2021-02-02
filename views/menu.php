<?php 
global $url;
?>

<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Accueil">Accueil</a>
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
    <a class="nav-link" href=<?php echo $url."/Bougie"?>>Bougies</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=<?php echo $url."/Livre"?>>Livres</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=<?php echo $url."/Event"?>>Events</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=<?php echo $url."/Odeur"?>>Odeurs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=<?php echo $url."/Recette"?>>Recettes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=<?php echo $url."/Auteur"?>>Auteurs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=<?php echo $url."/Collection"?>>Collections</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=<?php echo $url."/Stat"?>>Stats</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=<?php echo $url."/Accueil/Session"?>><?php if($_SESSION['login']==null){echo "Connexion";}else{echo $_SESSION['login']." [Déconnexion]";} ?></a>
  </li>
  <?php if(!isset($_SESSION['role']))
{
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="/User/create">S\'inscrire</a>';
  echo '</li>';
}
?>
</ul>
