<?php
// ici on récupère tous les articles (et les derniers selon condition) et le nbr de commentaires par article

require 'model/Manager.php';

class storiesManager extends Manager {

    public function getStoriesMain() {

        $data = $this->dbConnect();
        $sm = $data->query('SELECT * FROM billets');

    }

    public function getRecentStories() {

        $data = $this->dbConnect();
        $rs = $data->query('SELECT id,titre FROM billets ORDER BY id DESC LIMIT 0,5');
        return $rs;
    }

    public function countCommentsPerArticle($idArticle) { // nbr de commentaires par article
        
        $data = $this->dbConnect();
        $cca = $data->prepare('SELECT b.id, COUNT(c.id_billet) AS nbrComms
                               FROM commentaires c
                               INNER JOIN billets b
                               ON c.id_billet = b.id');
        return $cca;
    }
}