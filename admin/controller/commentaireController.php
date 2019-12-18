<?php

class commentaireController {

    public static function afficherCommentaires() {

        $ac = new commentaireManager;

        $acrep = $ac->rechercherCommentaires();

        $nbr_coms = $ac->compterCommentaires();

        require 'vue/commentaireView.php';
    }
}