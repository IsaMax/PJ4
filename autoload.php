<?php

//autoLoad des class
function autoClassAppel($maClass) {

    if( stripos($maClass, 'controller')) {

        require 'controller/'. $maClass . '.php';
    }
    else {
        require 'model/'. $maClass . '.php';
    }
}

spl_autoload_register('autoClassAppel');