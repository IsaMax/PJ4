<?php

class Manager {

    protected function dbConnect() {

        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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