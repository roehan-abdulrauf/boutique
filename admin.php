<?php
if ($_SESSION['id_droit'] === '23') {
    $_SESSION['id_droitAdmin'] = 23;
    // require_once('Config.php');
    // require_once('User.php');
    $user = new User;


    if (isset($_POST['deconnexion'])) {

        header('location:index.php?page=deconnexion');
        // session_start();
        // $_SESSION = array();
        // session_destroy();
        // header('location:index.php?page=connexion');
        // if (!$_SESSION['id']) {
        //     $loginMessage = 'You have been logged out.';
        //     include 'index.php';
        //     exit();
        // }
    }
    // var_dump($_SESSION['id_droit']);

?>


    <!DOCTYPE html>

    <head>
        <title>Page Administrateur</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style2.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>

        <div class="sidebar close">
            <div class="logo-details">
                <a href="index.php">
                    <i class='bx bxs-watch'></i>
                    <span class="logo_name">Boutique</span>
                </a>
            </div>
            <ul class="nav-links">
                <li>
                    <div class="icon-links">
                        <a href="index.php?page=tableau_de_bord-admin">
                            <i class='bx bxs-dashboard'></i>
                            <span class="link_name">Tableau de bord</span>
                        </a>
                        <!-- <ul class="sub-menu blank">
                        <li><a href="#" class="link_name">Tableau de bord</a></li>
                    </ul> -->
                    </div>
                </li>
                <li>
                    <div class="icon-links">
                        <a href="index.php?page=produit-admin">
                            <i class='bx bxs-collection'></i>
                            <span class="link_name">Produits</span>
                        </a>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <ul class="sub-menu">
                        <!-- <li><a href="#" class="link_name">Produits</a></li> -->
                        <li><a href="index.php?page=creer_produit-admin">Ajouter</a></li>
                    </ul>
                </li>
                <li>
                    <div class="icon-links">
                        <a href="index.php?page=compte-admin">
                            <i class='bx bxs-user'></i>
                            <span class="link_name">Compte</span>
                        </a>
                        <!-- <i class='bx bx-chevron-down'></i> -->
                    </div>
                    <!-- <ul class="sub-menu">
                    <li><a href="#" class="link_name">Compte</a></li>
                    <li><a href="index.php?page=modifier_droit-admin">Moifer un role</a></li>
                </ul> -->
                </li>
                <li>
                    <div class="icon-links">
                        <a href="index.php?page=historique-admin">
                            <i class='bx bxs-cart-alt'></i>
                            <span class="link_name">Commandes</span>
                        </a>
                        <!-- <ul class="sub-menu blank">
                            <li><a href="#" class="link_name">Commandes</a></li>
                        </ul> -->
                    </div>
                </li>
                <li>
                    <div class="icon-links">
                        <a href="index.php?page=message_reçu-admin">
                            <i class='bx bxs-comment-detail'></i>
                            <span class="link_name">Message Reçu</span>
                        </a>
                        <!-- <ul class="sub-menu blank">
                        <li><a href="#" class="link_name">Paramètre</a></li>
                    </ul> -->
                    </div>
                </li>
                <li>
                    <div class="icon-links">
                        <a href="#">
                            <i class='bx bxs-folder'></i>
                            <span class="link_name">Médias</span>
                        </a>
                        <!-- <ul class="sub-menu blank">
                        <li><a href="#" class="link_name">Médias</a></li>
                    </ul> -->
                    </div>
                </li>
                <li>
                    <div class="icon-links">
                        <a href="#">
                            <i class='bx bx-cog'></i>
                            <span class="link_name">Paramètre</span>
                        </a>
                        <!-- <ul class="sub-menu blank">
                        <li><a href="#" class="link_name">Paramètre</a></li>
                    </ul> -->
                    </div>
                </li>
                <li>
                    <div class="profile-details">
                        <div class="profile-content">
                            <i class='bx bxs-game' style='color:#ff0049'></i>
                        </div>
                        <div class="name-job">
                            <div class="profile_name">Admin</div>
                        </div>
                        <form method="POST">
                            <button name="deconnexion"><i class='bx bx-log-out'></i></button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </body>

    </html>
<?php } else {

    header('location:index.php');
}