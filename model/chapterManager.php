<?php

// récupère un article selon un id(GET), affiche les commentaires liés et permet d'en ajouter
require_once 'model/storyManager.php';

class storyManager extends Manager {

    private $data = $this->dbConnect();
    
    public function getStory($position) {
        
        $s = $this->$data->prepare('SELECT * FROM billets WHERE id = ?');

        switch($position) {
            case 'now':
                $s->execute(array($_GET['chapitre']));
                return $s;
            break;
            case 'previous':
                $s->execute(array($_GET['chapitre']-1));
                return $s;
            break;
            case 'next':
                $s->execute(array($_GET['chapitre']+1));
                return $s;
            break;
        }
    }

    public function getComments() {

        $sc= $this->$data->prepare('SELECT *, DATE_FORMAT(date_commentaire, "le %d/%m/%Y à %H:%m") AS date_com
                             FROM commentaires WHERE id_billet = ?');
        $sc->execute(array($_GET['chapitre']));
        return $sc;
    }

    public function countComments() {
        $nbrComments = $this->$data->prepare('SELECT COUNT(id) FROM commentaires WHERE id_billet = ?');
        $nbrComments->execute(array($_GET['chapitre']));
    }

    public function addComment() {

        $swc = $this->$data->prepare('INSERT INTO commentaires(id_billet, pseudo, commentaire)
                                     VALUES(:id_billet, :pseudo, :commentaire)');
        $swc->execute(array(
            ':id_billet' => $_GET['chapitre'],
            ':pseudo' => $_POST['pseudo'], // voir pour le récupérer directement lors de l'authentification
            ':commentaire' => $_POST['commentaire'],
        ));
    }

    public function alertComment() {

        $alert = $this->$data->prepare('INSERT INTO commentaires(signalement) VALUES(1) WHERE id = ?');
        $alert->execute(array($_GET['alert']));
    }
}