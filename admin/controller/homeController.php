<?php

require 'model/homeManager.php';

class homeController {

    public function afficherChapitre() {

        $hm = new homeManager();

        // récupère les chapitres
        $reqs = $hm->appelerChapitres();

        // récupère les signalements
        $dsrep = $hm->rechercheSignalement();

        // récupère les signalements
        $rmrep = $hm->rechercheMessage();


        require 'vue/homepageView.php';
    }

}