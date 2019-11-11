<?php

// récupère un article selon un id(GET), affiche les commentaires liés et permet d'en ajouter
require_once 'model/Manager.php';

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

    public function alertAnswer() {

        $data = $this->dbConnect();
        $alertAnswer = $data->prepare('UPDATE reponse_commentaire SET signalement = 1 WHERE id = ?');
        $alert->execute(array($_GET['alert']));
    }

    public function getNextStories() {

        $data = $this->dbConnect();
        $nst = $data->prepare('SELECT id, titre FROM billets WHERE id > ? LIMIT 0, 5');
        $nst->execute(array($_GET['chapitre']));    
        return $nst;
    }

    public function getCommentAnswers() {

        $data = $this->dbConnect();
        $gca = $data->query('SELECT *, DATE_FORMAT(date_reponse, "le %d/%m/%Y à %H:%m") AS date_rep FROM reponse_commentaire');
        
        return $gca;
    }

    public function postCommentAnswers() {

        $data = $this->dbConnect();
        $pca =$data->prepare('INSERT INTO reponse_commentaire(id_parent,
                                                              pseudo,
                                                              commentaire,
                                                              url_image)
                              VALUES(:id_parent,
                                    :pseudo,
                                     :commentaire,
                                     :url_image)');

        $pca->execute([":id_parent"   => $_GET['id_parent'],
                       ":pseudo"      => $_SESSION['user_name'] ,
                       ":commentaire" => $_POST['commentaire_rep'],
                       ":url_image"    => $_SESSION['user_image']]);
      
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

    public function editCommentAnswer() {

        $data = $this->dbConnect();
        $ec = $data->prepare('UPDATE reponse_commentaire 
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


    public function supprCommentAnswer() {

        $data = $this->dbConnect(); 
        $sc = $data->prepare('DELETE FROM reponse_commentaire
                              WHERE id = :id_commentaire');
        $sc->execute([":id_commentaire" => $_POST['id_commentaire']]);
    }

}