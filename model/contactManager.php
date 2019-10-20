<?php

require_once 'model/Manager.php';

class contactManager extends Manager {

    public function insertMessage($prenom, $mail, $contenu) {

        $data = $this->dbConnect();
        $contact = $data->prepare('INSERT INTO contact(prenom, mail, contenu) 
                                VALUES(:prenom, :mail, :contenu)');
        $success = $contact->execute(array(
            ':prenom' => $prenom,
            ':mail' => $mail,
            ':contenu' => $contenu,
        ));
        return $success;
    }
}