
<?php
ob_start();
?>
<div class="container-bloc-articles">

    <?php
        foreach ($reqs as $req) { ?>

            <div class="bloc-chapitre">
                <div class="options-chapitre">
                    <span><a href="index.php?action=editer&chapitre=<?= $req['id']; ?>"><i class="fa fa-pencil"></i>Editer</a></span>
                    <span><a href="index.php?action=supprimer&chapitre=<?= $req['id']; ?>"><i class="fa fa-trash"></i>Supprimer</a></span>
                </div>
                <div class="illustration-chapitre" style="<?= 'background-image: url('.$req["lien_image"].')';?>">
                </div>
                <div class="informations-chapitre">
                    <h4 class="titre-chapitre"><?= $req['titre']; ?></h4>
                    <p class="extrait-chapitre"><?= $req['contenu']; ?></p>
                    <a href="././&chapitre=<?= $req['id']; ?>"></a>
                </div>
            </div>
    <?php } ?>

        <div class="bloc-chapitre ajouter-chapitre"> + </div>
</div>

<?php
$content = ob_get_clean();

require 'template.php';
?>