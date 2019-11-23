
<nav class="nav-horizontale">
    <div class="auteur"><p>le blog de Jean forteroche</p></div>
    <div>
        <?php
            if(isset($_GET['chapitreEnregistrer'])) {
                if($_GET['chapitreEnregistrer']) {
                    echo '<div class="enregistrementTrue">Chapitre enregistré !</div>';
                }
                else {
                    echo '<div class="enregistrementFalse">Erreur lors de l\'enregistrement</div>';
                }
            }
        ?>
    </div>
    <div>
        <a href="index.php?action=deconnecter" title="se déconnecter"><i class="fa fa-sign-out"></i></a>
    </div>
</nav>