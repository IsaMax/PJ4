<?php

class messageController {



    public  function afficherMessages() {

        require 'model/messageManager.php';

        $am = new messageManager;

        $amrep = $am->rechercherMessages();

        require 'vue/messageView.php';
    }
}