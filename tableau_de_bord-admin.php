<?php

require_once './back/back_tableau_de_bord-admin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page Creer Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style2.css" />
</head>

<body>
    <div class="h1-titre-admin">
    <h1>Bienvenue sur votre tableau de bord Admin</h1>
    </div>
    <div class="h1-titre-admin">
        <h1>Connectés</h1>
    </div>
    <?php
    require_once 'admin.php' ?>
    <section>
        <table class="table">
            <thead>
                <tr>
                    <th class="th" scope="col">ip</th>
                    <th class="th" scope="col">derniere</th>
                    <th class="th" scope="col">Pseudo</th>
                </tr>
            </thead>
            <tbody>
                <!-- <?php foreach ($checke as $c) { var_dump($checke);?>
                    <tr>
                        <td class="td" value=" <?php echo $c['ip']; ?>"><?= $c['ip'] ?></td>
                        <td class="td" value=" <?php echo $c['ip']; ?>"><?= $c['derniere'] ?></td>
                        <td class="td" value=" <?php echo $c['ip']; ?>"><?= $c['pseudo'] ?></td>
                    </tr>
                <?php }; ?> -->
            </tbody>
        </table>
    </section>
</body>

</html>