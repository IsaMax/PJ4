<?php

class messageController {


    public static function afficherMessages() {

        $am = new messageManager;

        $amrep = $am->rechercherMessages();

        require 'vue/messageView.php';
    }
}