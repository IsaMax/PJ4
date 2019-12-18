<?php 


class contactController {

    public static function postMessage() {

        if(isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['contenu'])) {

            $message = new contactManager();
            $success = $message->postMessage();

            if($success) {

                mail("maxime.isambert@gmail.com", "Message privé du Blog J. Forteroche", $_POST['contenu']);

                header('Location: index.php?action=contact&send=ok');
            }
            else {
                header('Location: index.php?action=contact&send=non');
            }
        }
    }
}