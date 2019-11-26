<?php

require 'model/Manager.php';

class editManager extends Manager {

    public function getAllChapter() {
        $db = $this->dbConnect();

        $gac = $db->prepare('SELECT * FROM billets WHERE id = ?');
        $gac->execute([$_GET['chapitre']]);

        return $gac->fetchAll();
    }

    public function enregistrerChapitre() {
        $db = $this->dbConnect();

        $ec = $db->prepare('INSERT INTO billets(titre, contenu, lien_image)
                       VALUES(:titre, :contenu, :image)');

        $valeurRetour = $ec->execute([
                    ":titre"   => $_POST['titre'],
                    ":contenu" => $_POST['contenu'],
                    ":image"   => $_POST['lien_image']
        ]);

        return $valeurRetour;
    }

    public function majChapitre() {

        $db = $this->dbConnect();

        $majc = $db->prepare('UPDATE billets
                              SET titre = :titre,
                                  contenu = :contenu,
                                  lien_image = :image
                              WHERE id = :id');

        $valeurRetour = $majc->execute([
                       ":titre"   => $_POST['titre'],
                       ":contenu" => $_POST['contenu'],
                       ":image"   => $_POST['lien_image'],
                       ":id"      => $_GET['chapitre']
        ]);

        return $valeurRetour;
    }
}