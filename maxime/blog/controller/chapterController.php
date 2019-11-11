<?php

require 'model/chapterManager.php' ;
require 'facebook-login-blog.php';

class chapterController {
    
    public function getChapter() {


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



         // Gère le SGNALEMENT DES REPONSES aux commentaires
        if(isset($_GET['alertAnswer'])) {
            $_GET['alertAnswer'] = (int) $_GET['alertAnswer'];

            if($_GET['alertAnswer'] > 0) {
                $chapter->alertAnswer();
            }   
        }
       

        // Affiche les prochains chapitres
       $nextStories = $chapter->getNextStories();



       // Affiche les réponses aux commentaires
        $answer = $chapter->getCommentAnswers();
        $answerTab = $answer->fetchAll(); // Met tous les élts dans $answerTab pour pouvoir les lire plusieurs fois ! 
                                          // Car le curseur de lecture se retrouve à la fin et il n'est pas possible de relire 
                                          // les données sur une nouvelle boucle ! 



        // Poste les réponses aux commentaires
        if(isset($_GET['id_parent']) /*AND
           isset($_POST['pseudo_rep']) */AND
           isset($_POST['commentaire_rep'])) {

            $chapter->postCommentAnswers();
            
            header('Location: /blog/index.php?action=histoire&chapitre='.$_GET['chapitre'].'#'.$_GET['id_parent']);
        }
        else {
            // voir quoi ajouter ici
        }



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
            
            else if(isset($_GET['comment_is_answer']) AND $_GET['comment_is_answer'] == 'true') {


                if($_GET['pseudo'] == $_SESSION['user_name'] AND $_GET['edit_comment'] == 'true') {
                    
                    $chapter->editCommentAnswer();
                }
    
               else {
                    throw new Exception('erreur lors de l\' envoie des informations');
                } 
            }
            else {
                throw new Exception('Impossible d\'éditer votre commentaire');
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
            
            else if(isset($_GET['comment_is_answer']) AND $_GET['comment_is_answer'] == 'true') {

                $_POST['id_commentaire'] = (int)  $_POST['id_commentaire'];

                if($_GET['pseudo'] == $_SESSION['user_name'] AND $_GET['suppr_comment'] == 'true' AND $_POST['id_commentaire'] > 0) {

                    $chapter->supprCommentAnswer();
                }
    
               else {
                    throw new Exception('erreur lors de l\' envoie des informations');
                } 
            }
            else {
                throw new Exception('Impossible d\'éditer votre commentaire');
            }
         }

       require  'view/chapter/chapterView.php';
       
    }
   

    // récupérer toutes les erreurs et faire une page dédiée

}