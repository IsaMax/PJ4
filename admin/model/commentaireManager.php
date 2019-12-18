<?php

class commentaireManager extends Manager {

    public function rechercherCommentaires() {

        $db = $this->dbConnect();

        $rc = $db->query('SELECT DATE_FORMAT(date_commentaire, "%d/%m/%Y") AS date_format, titre, id_billet, pseudo, commentaire, url_image
                        FROM commentaires 
                        INNER JOIN billets 
                        ON commentaires.id_billet = billets.id
                        ORDER BY titre'
                        );

        return $rc->fetchAll();
    }


    public function compterCommentaires() {

        $db = $this->dbConnect();

        $cc = $db->query('SELECT COUNT(id) AS nbr_coms FROM commentaires');

        return $cc->fetch();
    }
}