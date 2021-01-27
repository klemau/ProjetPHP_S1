<h2>Menu</h2>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/ProjetPHP_S1/">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="User"><?php if($_SESSION["login"]==null){echo "Connexion";}else{echo $_POST["login"];} ?></a>
  </li>
</ul>