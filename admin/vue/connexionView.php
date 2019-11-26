<!DOCTYPE html>
<html>
<head>
    <title>Connexion </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Demo Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./public/css/admin.css">
</head>
<body class="body-connexion">

<?php

require 'navbarSecondaireView.php'; ?>

<div class="bloc-co">

    <form action="./index.php?auth=connexion" method="POST" id="form_connexion">
       <p>
           <label for="email">Email</label>
             <input type="mail" name="mailco" placeholder="Votre email" id="email"  style="
         <?php
            if(!$emailOk) {
                echo 'border: 2px solid red';
            }
          ?>" autocomplete="off">
       </p>

        <p>

        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdpco" placeholder="Votre mot de passe" id="mdp" style="
         <?php

        if(!$mdpOk) {
            echo 'border: 2px solid red';
        }
        ?>" autocomplete="off">
        </p>
        <p>
            <input class="btn" type="submit" name="mail" id="btn_envoyer">
        </p>
    </form>
</div>

</body>
</html>