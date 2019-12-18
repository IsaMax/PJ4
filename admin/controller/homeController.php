<?php


class homeController {

    public static function afficherChapitre() {

        $hm = new homeManager;

        // récupère les chapitres
        $reqs = $hm->appelerChapitres();

        // récupère les signalements
        $dsrep = $hm->rechercheSignalement();

        // compte les messages
        $rmrep = $hm->rechercheMessage();

        // compte les billets
        $nbrbillet = $hm->compteNombreBillets();

        require 'vue/homepageView.php';
    }

}