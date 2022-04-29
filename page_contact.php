<?php

require_once './back/back_page_contact.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style2.css" />
</head>
<div align="center">
    <form method="POST">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="border-right">
            <div class="row">
                <div class="padd-3">
                    <h1 class="h1form text-left border-bottom">Contact</h1>
                    <div>
                        <label class="label" for="nom">Votre nom complet</label>
                        <input class="inputtext" type="text" id="nom" name="nom" placeholder="Martin ..." required>
                    </div>
                    <div>
                        <label class="label" for="sujet">Le sujet de votre message</label>
                        <input class="inputtext" type="text" id="sujet" name="sujet" placeholder="sujet" required>
                    </div>
                    <div>
                        <label class="label" for="message">Votre message</label>
                        <input class="inputtextarea" type="textarea" id="message" name="message" placeholder="Bonjour, je vous contacte car...." required></textarea>
                    </div>
                    <button class="Buttoncommande" name="btncommande">Envoyer mon message</button>
                    </td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>

</html>