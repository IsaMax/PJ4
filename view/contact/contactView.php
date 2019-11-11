<?php
ob_start();
?>
<div class="col-md-12">
    <?php 
    if($_GET['success'] == 'false') {
    ?>

    <form action="index.php?action=contact" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="prenom" >Votre prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="mail">Votre adresse email</label>
                <input type="mail" name="mail" id="mail" class="form-control">
            </div>
            <div class="form-group col-md-12">
                <label for="contenu">Votre message</label>
                <textarea name="contenu" id="contenu" class="form-control" rows="10"></textarea>
            </div>
            <p><input type="submit" class="btn btn-envoie"></p>
        </div>
    </form>

    <?php 
    }
    else {
        echo '<p class="messageEnvoye">Votre message à bien été envoyé !</p>';
    }
    ?>
</div>
<?php
$firstContentLeft = ob_get_clean();
$titlePage = 'contactez-moi ! - blog de Jean FORTEROCHE';
require 'view/template.php';
?>