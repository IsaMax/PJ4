<?php

class Manager {

    protected function dbConnect() {

        $db = new PDO('mysql:host=localhost;dbname=agencestw_maxime-projet4;charset=utf8', 'agencestw', 'xsuAmrg3rwbly6s', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}

    /* 

    récupérer toute l'histoire ; les derniers articles
    
    les derniers commentaires
    Un article en particulier
    les commentaires liés à cet article
    écrire un commentaire

    */