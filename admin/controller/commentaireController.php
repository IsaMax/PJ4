<?php

require 'model/commentaireManager.php';

class commentaireController {

    public function afficherCommentaires() {

        $ac = new commentaireManager;

        $acrep = $ac->rechercherCommentaires();

        $nbr_coms = $ac->compterCommentaires();

        require 'vue/commentaireView.php';
    }
}