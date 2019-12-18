<?php


class contactManager extends Manager {

    public function postMessage() {

        $data = $this->dbConnect();
        $contact = $data->prepare('INSERT INTO contact(prenom, mail, contenu) 
                                VALUES(:prenom, :mail, :contenu)');
        $success = $contact->execute([
            ':prenom' => $_POST['prenom'],
            ':mail' => $_POST['mail'],
            ':contenu' => $_POST['contenu'],
        ]);


        return $success;
    }
}