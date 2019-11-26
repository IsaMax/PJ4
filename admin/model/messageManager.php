<?php

require 'model/Manager.php';

class messageManager extends Manager {

    public function rechercherMessages() {

        $db = $this->dbConnect();

        $rm = $db->query('SELECT * FROM contact');

        return $rm->fetchAll();
    }
}