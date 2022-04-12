<!DOCTYPE html>

<head>
    <title>Page Administrateur</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style2.css" />
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- <section class="menu_vertical">
        <div class="titreXicone">
        <i class='bx bxs-dashboard'></i>
            <h2><a href="#">Tableau de bord</a></h2>
        </div>
        <div class="dropdown ">
            <div class="titreXicone">
            <img src="img/produit.png" />
                <h2><a href="produit-admin.php">Produits</a></h2>
            </div>
            <div class="dropdown-child">
                <a href="creer_produit">Ajouter un produit</a>
                <a href="modifier_produit">Modifier un produit</a>
                <a href="Supprimer_produit">Supprimer un produit</a>
            </div>
        </div>
        <div class="dropdown">
            <div class="titreXicone">
                <img src="img/commentaire.png" />
                <h2><a href="commentaire-admin.php">Commentaires</a></h2>
            </div>
            <div class="dropdown-child">
                <a href="#">Supprimer un commentaire</a>
                <a href="#">Avertissement commentaire</a>
            </div>
        </div>
        <div class="dropdown">
            <div class="titreXicone">
                <img src="img/utilisateur.png" />
                <h2><a href="compte-admin.php">Compte</a></h2>
            </div>
            <div class="dropdown-child">
                <a href="#">Modifier le droit d'un utilisateur</a>
                <a href="#">Supprimer un utilisateur</a>
            </div>
        </div>
        <div class="titreXicone">
            <img src="img/medias.png" />
            <h2><a href="#">Médias</a></h2>
        </div>
    </section> -->

    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-dashboard'></i>
            <span class="logo_name">Boutique</span>
        </div>
        <ul class="nav-links">
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bxs-dashboard'></i>
                        <span class="link_name">Tableau de bord</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a href="#" class="link_name">Tableau de bord</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bxs-collection'></i>
                        <span class="link_name">Produits</span>
                    </a>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="#" class="link_name">Produits</a></li>
                    <li><a href="#">Ajouter</a></li>
                    <li><a href="#">Modifier</a></li>
                    <li><a href="#">Supprimer</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bxs-comment-detail'></i>
                        <span class="link_name">Commentaires</span>
                    </a>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="#" class="link_name">Commentaires</a></li>
                    <li><a href="#">Avertissement</a></li>
                    <li><a href="#">Supprimer</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bxs-user'></i>
                        <span class="link_name">Compte</span>
                    </a>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="#" class="link_name">Compte</a></li>
                    <li><a href="#">Mofifer un role</a></li>
                    <li><a href="#">Supprimer</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bxs-folder'></i>
                        <span class="link_name">Médias</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a href="#" class="link_name">Médias</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bxs-cart-alt'></i>
                        <span class="link_name">Commandes</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a href="#" class="link_name">Commandes</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bx-cog'></i>
                        <span class="link_name">Paramètre</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a href="#" class="link_name">Paramètre</a></li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="profile-details">
            <div class="profile-content">
            <i class='bx bxs-game' style='color:#ff0049'  ></i>
            </div>
            <li>
            <div class="name-job">
                <div class="profile_name">Admin</div>
            </div>
            <i class='bx bx-log-out' ></i>
        </div>
    </div>
</body>

</html>