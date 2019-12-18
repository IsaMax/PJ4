<?php
ob_start();
// page d'édition des billets

if($_GET['state'] === "maj") {

    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $lien_image = $_POST['lien_image'];
    $chapitre = $_GET['chapitre'];
}
else {

    $titre = "";
    $contenu = "";
    $lien_image = "";
}

if($donnesAEditer != null) {

    foreach($donnesAEditer as $elt) {
        ?>

        <form class="form-edition" action="index.php?action=editer&etat=enregistrement<?php
        if (isset($_GET['chapitre'])) {
            echo '&chapitre=' . $_GET['chapitre'];
        } ?>"
              method="POST" enctype="multipart/form-data">
            <p>
                <label for="titre_edit" class="label-titre">Titre du chapitre <span class="danger">*</span></label>
                <input type="text" name="titre" id="titre_edit" value="<?= $elt['titre'] ?>" required>
            </p>

            <p>
                <label for="lien_image_edit" class="label-lien">Votre image <span class="danger">*</span></label>
                <input type="file" name="lien_image" id="lien_image_edit" value="<?= $elt['lien_image'] ?>" required>
            </p>

            <p>
                <label for="contenu_edit" class="label-contenu">Contenu du chapitre <span class="danger">*</span></label>
                <textarea name="contenu" id="contenu_edit"><?= $elt['contenu'] ?></textarea>
            </p>
            <p>
                <input type="submit" id="btn_edit" value="valider" class="btn envoyer">
                <input type="reset" value="reset" class="btn reset">
            </p>
        </form>


        <?php
    }
}
else { ?>

    <form class="form-edition" action="index.php?action=editer&etat=enregistrement<?php
    if (isset($_GET['chapitre'])) {
        echo '&chapitre=' . $_GET['chapitre'];
    } ?>"
          method="POST" enctype="multipart/form-data">

        <p>
            <label for="titre_edit" class="label-titre">Titre du chapitre <span class="danger">*</span></label>
            <input type="text" name="titre" id="titre_edit" required>
        </p>
        <p>
            <label for="lien_image_edit" class="label-lien">Votre image <span class="danger">*</span></label>
            <input type="file" name="lien_image" id="lien_image_edit" required>
        </p>

        <p>
            <label for="contenu_edit" class="label-contenu">Contenu du chapitre <span class="danger">*</span></label>
            <textarea name="contenu" id="contenu_edit" ></textarea>
        </p>
        <p>
        <input type="submit" id="btn_edit" value="valider" class="btn envoyer">
        <input type="reset" value="reset" class="btn reset">
        </p>
    </form>
<?php
}

$content = ob_get_clean();
require 'template.php';
?>
