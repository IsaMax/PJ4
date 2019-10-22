<?php

// récupère un article selon un id(GET), affiche les commentaires liés et permet d'en ajouter
require_once 'model/storyManager.php';

class storyManager extends Manager {

    private $data = $this->dbConnect();

    public function getStory($idStory) {

        $s = $this->$data->prepare('SELECT * FROM billets WHERE id = ?');
        $s->execute(array($idStory));
        return $s;
    }

    public function getComments($idStory) {

        $sc= $this->$data->prepare('SELECT *, DATE_FORMAT(date_commentaire, "à écrit le %d/%m/%Y à %H:%m")
                             FROM commentaires WHERE id_billet = ?');
        $sc->execute(array($idStory));
        return $sc;
    }

    public function addComment($idStory) {

        $swc = $this->$data->prepare('INSERT INTO commentaires(id_billet, pseudo, commentaire)
                                     VALUES(:id_billet, :pseudo, :commentaire)');
        $swc->execute(array(
            ':id_billet' => $_GET['id'],
            ':pseudo' => $_POST['pseudo'], // voir pour le récupérer directement lors de l'authentification
            ':commentaire' => $_POST['commentaire'],
        ));
    }
}