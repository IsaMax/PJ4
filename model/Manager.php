<?php


//protected ne pourra etre appele que dans la classe et les classes qui en hérite
class Manager {

    protected function dbConnect() {

        $db = new PDO('mysql:host=localhost;dbname=agencestw_maxime-projet4;charset=utf8', 'agencestw', 'xsuAmrg3rwbly6s', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}
