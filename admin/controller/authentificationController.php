<?php

require 'model/authentificationManager.php';

class AuthentificationController {

    public function connexion() {

        if(isset($_POST['mailco']) AND isset($_POST['mdpco'])) {

            $auth = new authentificationManager;
            $emailOk = false;
            $mdpOk = false;

            $emails = $auth->getEmail();
            $mdps = $auth->getMdp();


            // On vérifie les correspondances avec ce qui se trouve dans la base
            foreach ($emails as $email) {

                if ($_POST['mailco'] == $email['email']) {
                    $emailOk = true;
                }
            }

            foreach ($mdps as $mdp) {

                if (password_verify($_POST['mdpco'], $mdp['mot_de_passe'])) {
                    $mdpOk = true;
                }
            }

            // Si tout est identique on se connecte
            // Sinon on redirige vers connexion et on y affiche les erreurs
            if ($mdpOk AND $emailOk) {

                $id = $auth->getId();
                session_start();

                $_SESSION['id'] = $id;
                $_SESSION['email'] = $_POST['mailco'];

                header('Location: ./index.php?action=accueil');
            }
            else {
                require 'vue/connexionView.php';
            }
        }
        else {
            require 'vue/connexionView.php';
        }
    }

    public function inscription() {

        if(isset($_POST['email']) AND isset($_POST['mdp'])) {

            $auth = new authentificationManager;

            $auth->verificationEmail();

            if($nbrEmail['nbrEmail'] == NULL) {

                $mdpCrypte = password_hash($_POST['mdp'], PASSWORD_BCRYPT);

                $auth->insererDonneesInscr($mdpCrypte);
               header('Location: index.php?auth=connexion&inscription');
            }
            else {
                require 'vue/pageInscription.php';
            }
        }
        else {
            require 'vue/pageInscription.php';
        }
    }
}