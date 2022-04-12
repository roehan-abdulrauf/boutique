<?php
if (isset($_POST['deconnexion'])) {
    session_destroy();
    header('location:connexion.php');
}
?>
<header>
    <nav>
        <div class="titreXicone">
            <div class="logo">
                <a href="#">Logo</a>
            </div>
            <h1><a href="#">Titre de la boutique</a></h1>
        </div>
        <div class="dropdown">
            <h1 class="h1-hov"><a href="#">Titre de la boutique</a></h1>
            <div class="dropdown-child">
                <h1><a href="#">Admin</a></h1>
                <h1><a href="#">Modifier le profil</a></h1>
                <h1><a href="#">Se deconnecter</a></h1>
            </div>
        </div>
    </nav>
</header>