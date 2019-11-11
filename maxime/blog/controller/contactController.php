<?php 

require 'model/contactManager.php';

class contactController {

    public function getMessage() {

        if(isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['contenu'])) {

            $message = new contactManager();
            $success = $message->insertMessage($_POST['prenom'], $_POST['mail'], $_POST['contenu']);

            //header('Location: index.php?action=contact&success='.$success);
        }
        else {
            $success = false;
           // header('Location: index.php?action=contact&success='.$success);
        }
        require 'view/contact/contactView.php';
    }
}