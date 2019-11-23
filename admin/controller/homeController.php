<?php

require 'model/homeManager.php';

class homeController {

    public function afficherChapitre() {

        $hm = new homeManager();

        $reqs = $hm->appelerChapitre();

        require 'view/homepageView.php';
    }

}