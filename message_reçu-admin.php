<?php

require_once './back/back_message_reçu-admin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page Message Admin</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style2.css" />
</head>

<body>
    <div class="h1-titre-admin">
        <h1>Message reçu</h1>
    </div>
    <?php
    require_once 'admin.php' ?>
    <section>
        <table class="table">
            <thead>
                <tr>
                    <th class="th" scope="col">Nom</th>
                    <th class="th" scope="col">Prenom</th>
                    <th class="th" scope="col">mail</th>
                    <th class="th" scope="col">Sujet</th>
                    <th class="th" scope="col">Message</th>
                    <th class="th" scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getcontact as $c) { ?>
                    <tr>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['nom'] ?></td>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['prenom'] ?></td>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['mail'] ?></td>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['sujet'] ?></td>
                        <td class="td" value=" <?php echo $c['id_contact']; ?>"><?= $c['message'] ?></td>
                        <td class="td"><a href="index.php?page=message_reçu-admin&action=suppression&id=<?php echo $c['id_contact'] ?>">supprimer</a></td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </section>
</body>

</html>