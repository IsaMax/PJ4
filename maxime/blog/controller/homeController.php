<?php

require 'model/homeManager.php';

class homeController {
    
    public function getHomepage() {

        $homeData = new homeManager();
        $stories = $homeData->getStories();
        $stories =  $stories->fetchAll();
        
        $nbrComments = $homeData->countCommentsPerArticle();
        $nbrComments = $nbrComments->fetchAll();

        $recentStories = $homeData->getRecentStories();
        
        $recentComments = $homeData->lastComments();
        
        require 'view/homepage/homepageView.php';
    }
}