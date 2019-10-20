<?php
ob_start();
?>
<div class="col-md-12">
    <?php 
    if(!$success) {
    ?>

    <form action="index.php?action=contact" method="POST">
        <p>
            <label for="prenom">Votre prénom</label>
            <input type="text" name="prenom" id="prenom">
        </p>
        <p>
            <label id="mail">Votre adresse email</label>
            <input type="mail" name="mail" id="mail">
        </p>
        <p>
            <label id="contenu">Votre message</label>
            <textarea name="contenu" id="contenu"></textarea>
        </p>
    </form>

    <?php 
    }
    else {
        echo '<p class="messageEnvoye">Votre message à bien été envoyé !</p>';
    }
    ?>
</div>
<?php
$content = ob_get_clean();

require 'view/template.php';
?>