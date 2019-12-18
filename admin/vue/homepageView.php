
<?php
ob_start();
?>
<div class="container-bloc-articles">

    <?php
    $inc = 0;
        foreach ($reqs as $req) { ?>

            <div class="bloc-chapitre">
                <div class="options-chapitre">
                    <span>
                        <a href="index.php?action=editer&chapitre=<?= $req['id']; ?>&etat=maj"><i class="fa fa-pencil"></i>Editer</a>
                    </span>

                    <span>
                       <?php
                        $_SESSION['chapitreASupprimer'] = $req['id'];
                       ?>
                        <a href="index.php?action=supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ?')"><i class="fa fa-trash"></i>Supprimer</a>
                    </span>
                </div>
                <div class="illustration-chapitre" style="<?= 'background-image: url('.$req["lien_image"].')';?>">
                </div>
                <div class="informations-chapitre">
                    <h4 class="titre-chapitre"><?= $req['titre']; ?></h4>
                    <p class="extrait-chapitre"><?= substr(strip_tags($req['contenu']), 0, 100).'...'; ?></p>
                    <a href="/blog/histoire/chapitre-<?= $req['id'] ?>"></a>
                </div>
            </div>
    <?php
        $inc++;
        } ?>

        <a class="bloc-chapitre ajouter-chapitre" href="nouveau-chapitre">
            <?php
            if($inc == 0) {
                echo '<span>Aucun billets trouvés : ajouter</span>';
            }
            ?>+
        </a>
</div>

<?php
$content = ob_get_clean();

require 'template.php';
//index.php?action=editer&chapitre=<?= $req['id']; &etat=maj"
?>