<?php

require 'model/homeManager.php';

$homeData = new homeManager();
$titlePage = 'le blog de Jean FORTEROCHE';
class homeController {

    public function allStories() {

        $stories = $homeData->getStories();
        $nbrComments = $homeData->countCommentsPerArticle();

        require 'view/homepage/storiesView.php';
    }

    public function recentStories() {

        $recentStories = $homeData->getRecentStories();

        require 'view/homepage/recentStoriesView.php';
    }

    public function recentComments() {

        $recentComments = $homeData->lastComments();

        require 'view/homepage/commentsView.php';
    }


}