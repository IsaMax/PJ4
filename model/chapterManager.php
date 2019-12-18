<?php

// récupère un article selon un id(GET), affiche les commentaires liés et permet d'en ajouter

class chapterManager extends Manager {


    public function getStory($position) {
        
        $data = $this->dbConnect();
        $s = $data->prepare('SELECT * FROM billets WHERE id = ?');

        switch($position) {
            case 'now':
                $s->execute(array($_GET['chapitre']));
            break;
            case 'previous':
                $s->execute(array($_GET['chapitre']-1));
            break;
            case 'next':
                $s->execute(array($_GET['chapitre']+1));
            break;
        }
        return $s->fetch();
    }

    public function getComments() {

        $data = $this->dbConnect();
        $sc= $data->prepare('SELECT *, DATE_FORMAT(date_commentaire, "le %d/%m/%Y à %H:%m") AS date_com
                             FROM commentaires WHERE id_billet = ?');
        $sc->execute([$_GET['chapitre']]);
        return $sc;
    }

    public function addComment() {

        $data = $this->dbConnect();
        $swc = $data->prepare('INSERT INTO commentaires(id_billet, pseudo, commentaire, signalement, url_image)
                                     VALUES(:id_billet, :pseudo, :commentaire, 0, :url_image)');
        $swc->execute([
            ':id_billet' => $_GET['chapitre'],
            ':pseudo' => $_SESSION['user_name'],
            ':commentaire' => $_POST['commentaire'],
            ':url_image' => $_SESSION['user_image'],
        ]);
    }

    public function countComments() {

        $data = $this->dbConnect();
        $nbrComments = $data->prepare('SELECT COUNT(id) AS nbr_com FROM commentaires WHERE id_billet = ?');
        $nbrComments->execute(array($_GET['chapitre']));
        return $nbrComments->fetch();
    }

    public function alertComment() {

        $data = $this->dbConnect();
        $alert = $data->prepare('UPDATE commentaires SET signalement = 1 WHERE id = ?');
        $alert->execute(array($_GET['alert']));
    }


    public function getNextStories() {

        $data = $this->dbConnect();
        $nst = $data->prepare('SELECT id, titre, lien_image FROM billets WHERE id > ? LIMIT 0, 5');
        $nst->execute(array($_GET['chapitre']));    
        return $nst;
    }



    public function editComment() {

        $data = $this->dbConnect(); 
        $ec = $data->prepare('UPDATE commentaires 
                              SET commentaire = :new_commentaire 
                              WHERE id = :id_commentaire');
        $ec->execute([
                      ":new_commentaire" => $_POST['new_commentaire'],
                      ":id_commentaire" => $_GET['id_commentaire']]);
    }

    

    public function supprComment() {

        $data = $this->dbConnect(); 
        $sc = $data->prepare('DELETE FROM commentaires
                              WHERE id = :id_commentaire');
        $sc->execute([":id_commentaire" => $_POST['id_commentaire']]);
    }


}