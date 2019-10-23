<?php

require 'model/chapterManager.php' ;

class chapterController {

    private $chapter = new chapterManager();

    public function getChapter() {
        
        $chapterData = $this->$chapter->getStory('now');
        $chapterPreviousTitle = $this->$chapter->getStory('previous');
        $chapterNextTitle = $this->$chapter->getStory('next');

        require 'view/chapter/chapterView.php';
    }

    public function getChapterComments() {

        $chapterCommentsData = $this->$chapter->getComments();
        $nbrComments = $this->$chapter->countComments();
        require 'view/chapter/chapterCommentsView.php';
    }

    public function addComment() {

        if(isset($_POST['commentaire'])) {
            $this->$chapter->addComment(); // Attention le manager attends aussi le pseudo
        }
        else {
            $textareaVide = true;
        }
       require 'view/chapter/chapterCommentsView.php';
    }

    public function alertComment() {
        $this->$chapter->alertComment();
    }


    // edit comment

    // delete comment

}