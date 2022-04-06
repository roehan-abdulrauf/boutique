<?php
if (isset($_POST['deconnexion'])) {
    session_destroy();
    header('location:connexion.php');
}
?>
<header>
    <nav>
        <h1>Titre de la boutique</h1>
        <div class="titreXicone">
            <ul>connect</ul>
            <ul>panier</ul>
        </div>
        <div class="titreXicone">
            <ul>Boutique</ul>
            <ul>Admin</ul>
        </div>
    </nav>
</header>