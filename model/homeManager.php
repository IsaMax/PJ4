<?php
// ici on récupère tous les articles (et les derniers selon condition) et le nbr de commentaires par article


class homeManager extends Manager {

    public function getStories() {

        $data = $this->dbConnect();
        $gs = $data->query('SELECT * , DATE_FORMAT(date_billet, "%d,%m,%Y") AS publi_billet FROM billets');
        return $gs->fetchAll();
    }

    public function getRecentStories() {

        $data = $this->dbConnect();
        $grs = $data->query('SELECT id,titre,lien_image FROM billets ORDER BY id DESC LIMIT 0,5');
        return $grs;
    }

    public function lastComments() {

        $data = $this->dbConnect();
        $lc = $data->query('SELECT * FROM commentaires ORDER BY id DESC LIMIT 0, 6');
        return $lc;
    }

    public function countCommentsPerArticle() { 
        
        $data = $this->dbConnect();
        $cca = $data->query('SELECT b.id, COUNT(c.id_billet) AS nbrComms
                               FROM commentaires c
                               INNER JOIN billets b
                               ON c.id_billet = b.id
                               GROUP BY id_billet');
        return $cca;
    }
}