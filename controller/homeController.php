<?php

require 'model/homeManager.php';
$titlePage = 'le blog de Jean FORTEROCHE';

class homeController {

    public function getAllStories() {

        $homeData = new homeManager();
        $stories = $homeData->getStories();
        $nbrComments = $homeData->countCommentsPerArticle();
        
        require 'view/homepage/storiesView.php';
        
    }

    public function getRecentStories() {

        $homeData = new homeManager();
        $recentStories = $homeData->getRecentStories();
      
        require 'view/homepage/recentStoriesView.php';
        
    }

    public function getRecentComments() {

        $homeData = new homeManager();
        $recentComments = $homeData->lastComments();

        require 'view/homepage/commentsView.php';
    }
}