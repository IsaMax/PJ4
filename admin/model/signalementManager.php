<?php


class signalementManager extends Manager {

    public function rechercheSignalements() {
        $db = $this->dbConnect();

        $dbreq = $db->query('SELECT * FROM commentaires WHERE signalement = 1');

        return $dbreq->fetchAll();
    }

    public function approuverSignalement($id) {

        $db = $this->dbConnect();

        $as = $db->prepare('UPDATE commentaires 
                       SET signalement = 0
                       WHERE id = ?');

        $as->execute([$id]);
    }

    public function supprimerSignalement($id) {

        $db = $this->dbConnect();

        $ss = $db->prepare('DELETE FROM commentaires 
                            WHERE id = ?');

        $ss->execute([$id]);
    }
}
