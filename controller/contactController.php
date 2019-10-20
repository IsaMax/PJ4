<?php 

require 'model/contactManager.php';
$titlePage = 'contactez-moi ! - blog de Jean FORTEROCHE';
class contactController {

    public function getMessage() {

        $message = new contactController();
        $success = $message->insertMessage($_POST['prenom'], $_POST['mail'], $_POST['contenu']);

        require 'view/contact/contactView.php';
    }
}