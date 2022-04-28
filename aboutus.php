<?php
$view = new View;

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body class="body-propos">
    <main>

        <?php
        $view->headerStyle();
        ?>
    <div class="about-section">
        <div class="inner-container">
            <h1>Qui sommes-nous?</h1>
            <p class="text-propos">
                Bonjour et bienvenue sur Los Watches Hermanos, le site où trouver les montres les plus incroyables au monde.
                Lorsque nous nous sommes lancés à Marseille, nous avions un souhait commun. Notre passion pour les montres impliquait que nous 
                fournissions à nos clients uniquement des modèles haut de gamme avec une qualité de fabrication et un savoir-faire uniques.
                Chez Los Watches Hermanos, nous croyons à l’excellence de nos produits, mais aussi à notre service client. En effet, nous 
                mettons un point d’honneur à vous proposer un service client et assistance à la hauteur de la qualité de nos produits.
                Nous espérons que vous aimerez nos produits autant que nous aimons les trouver pour vous. 
                
            </p>
        </div>
    </div>
</main>
<?php
$view->footerStyle();
?>
</body>
</html>