<?php ob_start();?>
<div class="bloc-comments">
    <h3 class="nbr-comments"><?= $nbrComments ?></h3>
    <!-- apparaissent en jquery et envoie en ajax -->
    <div class="container-comments">

    <?php while($chapterComments = $chapterCommentsData->fetch()) {

            if($chapterComments['signalement'] > 0) {
                ?>
                <div class="comment">
                <p class="commennt-body alert">
                    Ce commentaire a été désactivé
                </p>
                </div>

            <?php
            }
            else {
        ?>
            <div class="comment">
                <div>
                    <div class="avatar"></div>
                </div>
                <div>
                    <div class="commentaire">
                        <span class="comment-name"><?= $chapterComments['pseudo']; ?></span>
                        <p class="commennt-body">
                            <?= $chapterComments['commentaire']; ?>
                        </p>
                    </div>
                    <div class="infos-comment">
                        <span class="rep-comment"><a href="">répondre</a></span>
                        <span class="alert-comment"><a href="index.php?action=histoire&amp;chapitre=<?= $chapterComments['id_billet']; ?>&amp;alert=<?= $chapterComments['id']; ?>">signaler</a></span>
                        <span class="date-comment"><a href=""><?= $chapterComments['date_com']; ?></a></span>
                    </div>
                </div>
            </div>

        <?php
            }
    }
    ?>
        
    <!-- formulaire JS -->
    <div>
        <div>
            <div class="avatar avatar-now"></div>
        </div>
        <form action="index.php?action=histoire&amp;chapitre=<?= $_GET['chapitre']; ?>&amp;postComment" method="POST">
            <p><textarea placeholder="
            <?php if($textareaVide) {
                echo 'Attention votre message est vide';
            }
            else {
                echo 'Laissez un commentaire...';
            }
            ?>            
            name="commentaire"></textarea></p>
            <p><input type="submit" name="send-comment" id="send-comment" value="envoyer"></p>
        </form>
    </div>

    </div>
</div>

<?php $secondContentLeft = ob_get_clean();
require 'view/template.php';
 ?>


  <!-- <div class="comment sous-comment">
            <div>
                <div class="avatar"></div>
            </div>
            <div>
                <div class="commentaire">
                    <span class="comment-name">sophia</span>
                    <p class="commennt-body">oui tu as raison !</p>
                </div>
                <div class="infos-comment">
                        <span class="rep-comment"><a href="">répondre</a></span>
                        <span class="alert-comment"><a href="">signaler</a></span>
                        <span class="date-comment"><a href="">il y a 1h</a></span>
                </div>
            </div>
        </div>

        <div class="comment sous-comment"> 
            <div>
                <div class="avatar"></div>
            </div>
            <div>
                <div class="commentaire">
                    <span class="comment-name">sophia</span>
                    <p class="commennt-body">oui tu as raison !</p>
                </div>
                <div class="infos-comment">
                        <span class="rep-comment">répondre</span>
                        <span class="alert-comment">signaler</span>
                        <span class="date-comment">il y a 1h</span>
                </div>
            </div>
        </div> -->