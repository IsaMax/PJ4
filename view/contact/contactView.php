<?php
ob_start();
?>
<div class="col-md-12">

    <?php
    if(isset($_GET['send'])) {

        if($_GET['send'] == 'ok') {
            echo '<p>Message envoyé !</p>';
        }
        else {
            echo '<p>Echec lors de l\'envoie du message !</p>';
        }
    }
    else { ?>
        <form action="index.php?action=contact&send" method="POST">
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
            </div>
            <div class="form-row">
                <div class=" col-md-12">
                    <label for="mail">En cochant cette case, vous acceptez que vos informations soient utilisées pour vous recontacter : </label>
                    <input type="checkbox" name="chekbox" id="chekbox" class="" required>
                </div>
            </div>

                <p><input type="submit" class="btn btn-envoie"></p>

        </form>
    <?php } ?>

</div>
<?php
$firstContentLeft = ob_get_clean();
$titlePage = 'contactez-moi ! - blog de Jean FORTEROCHE';
require 'view/template.php';
?>