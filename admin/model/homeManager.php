<?php

require 'model/Manager.php';

class homeManager extends Manager {

        public function appelerChapitres() {

            $db = $this->dbConnect();

            $dbr = $db->query('SELECT * FROM billets');

            return $dbr->fetchAll();
        }

        public function rechercheSignalement() {

            $db = $this->dbConnect();

            $dbr = $db->query('SELECT COUNT(signalement) AS signalement_coms FROM commentaires WHERE signalement = 1');

            return $dbr->fetch();
        }

    public function rechercheMessage() {

        $db = $this->dbConnect();

        $rm = $db->query('SELECT COUNT(*) AS nbr_messages FROM contact');

        return $rm->fetch();
    }
}