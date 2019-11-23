<?php

require 'model/Manager.php';

class AuthentificationManager extends Manager {

        public function appelerChapitre() {

            $db = $this->dbConnect();

            $dbr = $db->query('SELECT * FROM billets');

            return $dbr->fetchAll();
        }
}