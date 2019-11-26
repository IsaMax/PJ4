
<nav class="nav-horizontale">
   <div class="auteur"> <a href="index.php?action=accueil"><p>le blog de Jean forteroche</p></a></div>
    <div class="infos-statut">

        <?php
        if(isset($_GET['action'])) {

            switch ($_GET['action']) {
                case 'accueil':
                    echo '<p class="titre-part-edit">Gestion du blog</p>';
                    break;
                case 'editer':
                    echo '<p class="titre-part-edit">Edition du chapitre</p>';
                    break;
                case 'signalement':
                    echo '<p class="titre-part-edit">Commentaires signalés</p>';
                    break;
                case 'messages':
                    echo '<p class="titre-part-edit">Liste des messages</p>';
                    break;
                case 'commentaires':
                    echo '<p class="titre-part-edit">Liste des '.$nbr_coms['nbr_coms'].' commentaires non signalés</p>';
                    break;
            }
        }
        else if(isset($_GET['auth'])) {

            switch ($_GET['auth']) {

                case 'inscription':
                    echo '<p class="titre-part-edit">Veuillez vous inscrire</p>';
                    break;
                case 'connexion':
                    echo '<p class="titre-part-edit">Veuillez vous connecter</p>';
                    break;
            }
        }

        else if(isset($_GET['chapitreEnregistrer'])) {
            if($_GET['chapitreEnregistrer']) {
                echo '<div class="enregistrementTrue">Chapitre enregistré !</div>';
            }
            else {
                echo '<div class="enregistrementFalse">Erreur lors de l\'enregistrement</div>';
            }
        }

        if(isset($_SESSION['email']) AND isset($_SESSION['id'])) {

             echo '<a href="index.php?action=deconnecter" title="se déconnecter"><i class="fa fa-sign-out"></i></a>';
        }
       ?>
    </div>
</nav>