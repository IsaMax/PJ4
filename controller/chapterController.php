<?php

require 'facebook-login-blog.php';

class chapterController {
    
    public static function getChapter() {


        // Affiche le chapitre requis et les flèches de navigation
        $chapter = new chapterManager();
        $chapterData = $chapter->getStory('now');
        $chapterPreviousTitle = $chapter->getStory('previous');
        $chapterNextTitle = $chapter->getStory('next');

       

        // Affiche les commentaires
        $chapterCommentsData = $chapter->getComments();
        $nbrComments = $chapter->countComments();

        // Ajoute le commentaire 
        if(isset($_POST['commentaire'])) {
            if(!empty($_POST['commentaire'])) {

                if(isset($_GET['id_parent'])) { // revoir cette partie
                    $chapter->postCommentAnswers(); // Attention le manager attends aussi le pseudo
                }
                else {
                    $chapter->addComment(); // Attention le manager attends aussi le pseudo
                   header('Location: /blog/index.php?action=histoire&chapitre='.$_GET["chapitre"]);
                }
            }
            else {
                $textareaVide = true;
            }
        }



        // Gère le SIGNALEMENT de commentaire
        if(isset($_GET['alert'])) {
            $_GET['alert'] = (int) $_GET['alert'];

            if($_GET['alert'] > 0) {
                $chapter->alertComment();
                header('Location: /blog/index.php?action=histoire&chapitre='.$_GET['chapitre']);
            }   
        }



        // Affiche les prochains chapitres
       $nextStories = $chapter->getNextStories();



         // edit comment on envoie le pseudo pour comparer avec la session plus un boolean
         if(isset($_GET['pseudo']) AND isset($_GET['edit_comment']) AND isset($_GET['id_commentaire']) AND isset($_POST['new_commentaire'])) {
  
            if(isset($_GET['comment_is_answer']) AND $_GET['comment_is_answer'] == 'false') { // on regarde si il s'agit d'une réponse ou non

                $_GET['id_commentaire'] = (int)  $_GET['id_commentaire'];
                
                if($_GET['pseudo'] == $_SESSION['user_name'] AND $_GET['edit_comment'] == 'true' AND $_GET['id_commentaire'] > 0) {
             
                    $chapter->editComment();
                }
    
               else {
                    throw new Exception('erreur lors de l\' envoie des informations');
                }
            }

         }

         

         // suppr comment 
         if(isset($_GET['pseudo']) AND isset($_GET['suppr_comment']) AND isset($_POST['id_commentaire'])) {

            if(isset($_GET['comment_is_answer']) AND $_GET['comment_is_answer'] == 'false') { 

                $_POST['id_commentaire'] = (int)  $_POST['id_commentaire'];
                
                if($_GET['pseudo'] == $_SESSION['user_name'] AND $_GET['suppr_comment'] == 'true' AND $_POST['id_commentaire'] > 0) {

                    $chapter->supprComment();
                }
    
               else {
                    throw new Exception('erreur lors de l\' envoie des informations');
                }
            }

         }

       require  'view/chapter/chapterView.php';
       
    }

}