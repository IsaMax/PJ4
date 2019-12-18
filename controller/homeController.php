<?php

class homeController {
    
    public static function getHomepage() {

        $homeData = new homeManager();
        $stories = $homeData->getStories();

        
        $nbrComments = $homeData->countCommentsPerArticle();
        $nbrComments = $nbrComments->fetchAll();

        $recentStories = $homeData->getRecentStories();
        
        $recentComments = $homeData->lastComments();
        
        require 'view/homepage/homepageView.php';
    }
}