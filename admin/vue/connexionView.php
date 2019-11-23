<?php
ob_start();

    if($nbrEmail == NULL) {

        if(isset($mdpOk) AND isset($emailOk)) {
            if(!$mdpOk AND !$emailOk) {
                echo '<h3>Inscription réussi, bienvenue sur le compte administrateur, veuillez vous connecter :</h3>';
            }
            else {
                echo'<h3>Attention il y a des erreurs dans votre formulaire</h3>';
            }
        }
        else {
            echo'<h3>Veuillez vous connecter</h3>';
        }

    }
    else {

        if(isset($mdpOk) AND isset($emailOk)) {
            if(!$mdpOk AND !$emailOk) {
                echo '<h3>Vous êtes déjà inscrit, voulez-vous vous connecter ?</h3>';
            }
            else {
                echo'<h3>Attention il y a des erreurs dans votre formulaire</h3>';
            }
        }
        else {
            echo'<h3>Veuillez vous connecter</h3>';
        }

    }

    if(!$mdpOk) {
        echo '<span class="mdpIncorrect"> Mot de passe incorrect </span>' ;
    }
    else if(!$emailOk) {
        echo '<span class="emailIncorrect"> Email incorrect </span>' ;
    }
?>

    <form action="./index.php?auth=connexion" method="POST" id="form_connexion">

        <label for="email">Votre email : </label><input type="mail" name="mailco" id="email" value="
        <?php

        if(isset($_POST['email'])) {
            echo $_POST['email'];
        }

        ?>" style="
         <?php
            if(!$emailOk) {
                echo 'border: 2px solid red';
            }
          ?>">

        <label for="mdp">Votre mot de passe : </label> <input type="password" name="mdpco" id="mdp" style="
         <?php

        if(!$mdpOk) {
            echo 'border: 2px solid red';
        }
        ?>">
        <input type="submit" name="mail" id="btn_envoyer">
    </form>
    <a href="./index.php?auth=inscription">Pas encore inscrit ?</a>


<?php
$content = ob_get_clean();
require 'template.php';
?>