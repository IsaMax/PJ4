<?php

require 'model/homeManager.php';

$homeData = new homeManager();
$titlePage = 'le blog de Jean FORTEROCHE';
class homeController {

    public function getAllStories() {

        $stories = $homeData->getStories();
        $nbrComments = $homeData->countCommentsPerArticle();

        require 'view/homepage/storiesView.php';
        $this->getRecentStories();
    }

    public function getRecentStories() {

        $recentStories = $homeData->getRecentStories();

        require 'view/homepage/recentStoriesView.php';
        $this->getRecentComments();
    }

    public function getRecentComments() {

        $recentComments = $homeData->lastComments();

        require 'view/homepage/commentsView.php';
    }


}