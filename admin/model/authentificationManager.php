<?php

require 'model/Manager.php';

class AuthentificationManager extends Manager {

    public function verificationEmail() {
        $nbrEmail = 0;
        $ve = $this->dbConnect();

        $nbrEmail = $ve->prepare('SELECT COUNT(email) AS nbrEmail
                         FROM utilisateur_BO 
                         WHERE email = ? ');

        $nbrEmail->execute([$_POST['email']]);

        return $nbrEmail->fetchAll();
    }

    public function insererDonneesInscr($mdpCrypte) {
        $id = $this->dbConnect();

        $idr = $id->prepare('INSERT INTO utilisateur_BO(email,mot_de_passe)
                         VALUES(:email,:mdp)');


        $idr->execute([ ":email" => $_POST['email'],
                       ":mdp"   => $mdpCrypte]);
    }

    public function getEmail() {
        $ge = $this->dbConnect();

        $ger = $ge->query('SELECT email FROM utilisateur_BO');
        return $ger->fetchAll();
    }

    public function getMdp() {
        $gm = $this->dbConnect();

        $gmr = $gm->query('SELECT mot_de_passe FROM utilisateur_BO');
        return $gmr->fetchAll();
    }

    public function getId() {
        $gi = $this->dbConnect();

        $gir = $gi->prepare('SELECT id FROM utilisateur_BO WHERE email= ?');
        $gir->execute([$_POST['mailco']]);

        return $gir->fetch();
    }
}