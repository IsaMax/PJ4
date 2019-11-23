<?php
ob_start();
// page d'édition des billets

if($_GET['state'] == "maj") {

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
?>

<form action="index.php?action=editer&etat=enregistrement<?php
    if(isset($_GET['chapitre'])) {
        echo '&chapitre='.$_GET['chapitre'];
    } ?>"
      method="POST">
    <label for="titre_edit">Titre du chapitre</label>
    <input type="text" name="titre" id="titre_edit" value="<?= $titre ?>">

    <label for="lien_image_edit">Lien de l'image</label>
    <input type="text" name="lien_image" id="lien_image_edit" value="<?= $lien_image ?>">

    <label for="contenu_edit">Contenu du chapitre</label>
    <textarea name="contenu" id="contenu_edit"><?= $contenu ?></textarea>

    <input type="submit" id="btn_edit" value="valider">
    <input type="reset" value="reset">
</form>


<?php
$content = ob_get_clean();
require 'template.php';
?>
