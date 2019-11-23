<?php
ob_start();
?>
<h3>Veuillez vous inscrire</h3>
<form action="./index.php?auth=inscription" method="POST" id="form_inscription">
    <label for="email">Votre email : </label><input type="email" name="email" id="email">
    <label for="mdp">Votre mot de passe : </label> <input type="password" name="mdp" id="mdp">
    <label for="verifMdp">Confirmez le mot de passe : </label> <input type="password" name="verifMdp" id="verifMdp">
    <span class="mdpIdentique"></span>
    <input type="submit" id="btn_envoyer" disabled="true">
</form> <!-- vérifier les mdp avec js -->


<?php
$content = ob_get_clean();

// Désactiver car ajax
 require 'vue/template.php';
?>