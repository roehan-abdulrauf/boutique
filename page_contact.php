<?php

require_once './back/back_page_contact.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet"> -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet"> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">




</head>

<body>
    <?php
    $home = new View;
    $home->headerStyle();
    ?>
    <div class="container">
        <div class=" text-center mt-5 ">
            <h1>Formulaire de contact</h1>
        </div>
        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            <form method="POST">
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nom">Nom complet *</label>
                                                <input type="text" id="nom" name="nom" class="form-control" placeholder="Entrez votre nom complet *" required="required" data-error="champs obligatoire.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sujet"> Précisez le sujet*</label>
                                                <select id="sujet" name="sujet" class="form-control" required="required" data-error="Veuillez remplir correctement le champs">
                                                    <option value="" selected disabled>--Selectionnez votre problème--</option>
                                                    <option>où se trouve ma commande</option>
                                                    <option>A propos du statut de ma commande</option>
                                                    <option>Je voudrais annuler ma commande</option>
                                                    <option>Autre</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="message">Message *</label>
                                                <textarea id="message" name="message" class="form-control" placeholder="Ecrivez votre message." rows="4" required="required" data-error="Veuillez saisir votre message."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success btn-send  pt-2 btn-block" name="submit_contact">Envoyer mon message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $home->footerStyle();
    ?>
</body>

</html>