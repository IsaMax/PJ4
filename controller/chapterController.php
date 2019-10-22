<?php

require 'model/chapterManager.php' ;

class chapterController {

    private $chapter = new chapterManager();

    function getChapter($idChapter) {
  
        $chapterData = $this->$chapter->getStory($idChapter);

        require 'view/chapter/chapterView.php';
    }

    function getChapterComments($idChapter) {

        $chapterCommentsData = $this->$chapter->getComments($idChapter);

        require 'view/chapter/chapterCommentsView.php';

    }

}