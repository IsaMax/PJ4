<!-- ********** AFFICHE LE CHAPITRE REQUIS ********* -->

<?php
include 'facebook-login-blog.php';
ob_start(); ?>
<div class="bloc-items-left">
    <div class="image-head">
        <img src="/blog/admin/<?= htmlspecialchars($chapterData['lien_image']); ?>" alt="">
    </div>

    <div class="article">
        <h1><?= htmlspecialchars($chapterData['titre']); ?></h1>


        <?php
        if(isset($_SESSION['email']) AND isset($_SESSION['id'])) {

        $_SESSION['chapitreASupprimer'] = $chapterData["id"];

        echo '<div class="liens_admin"><a href="/blog/admin/index.php?action=editer&chapitre='.$chapterData["id"].'&etat=maj" class="lien-editer-chapitre">Éditer</a>';
        echo '<a href="/blog/admin/index.php?action=supprimer" class="lien-editer-chapitre">Supprimer</a></div>';
        } ?>

        <div class="content-body">
            <?= $chapterData['contenu'];

    $titlePage = "chapitre ". htmlspecialchars($chapterData['id'])." : ".htmlspecialchars($chapterData['titre']);
    $firstContentLeft = ob_get_clean(); ?>


<!-- ********** AFFICHE LES FLECHES DES CHAPITRES ********* -->
            <? ob_start(); ?>
            <hr>
            <div class="bloc-arrow">
                <div class="row">
            
                    <div class="col-md-6">
                    <?php if(empty($chapterPreviousTitle)) {
                            echo '<div class="arrow-left" title="chapitre précédent"></div>';
                         }
                         else {
                             ?>
                            <div class="arrow-left" title="chapitre précédent">
                                <a href="/blog/histoire/chapitre-<?= htmlspecialchars($chapterPreviousTitle['id']); ?>"><i>&#60;</i></a>
                                <p class="title-previous"><a href="/blog/histoire/chapitre-<?= htmlspecialchars($chapterPreviousTitle['id']); ?>">
                                <?= htmlspecialchars($chapterPreviousTitle['titre']); ?>
                                </a></p>
                                <p class="legend">billet précédent</p>
                            </div>
                             <?php
                         }?>
                        
                    </div>

                    <div class="col-md-6">
                    <?php if(empty($chapterNextTitle)) {
                            echo '';
                         }
                         else {
                             ?>
                                <div class="arrow-right" title="chapitre suivant">
                                    <a href="/blog/histoire/chapitre-<?= htmlspecialchars($chapterNextTitle['id']); ?>"><i>&#62;</i></a>
                                <p class="title-next"><a href="/blog/histoire/chapitre-<?= htmlspecialchars($chapterNextTitle['id']); ?>">
                                <?= htmlspecialchars($chapterNextTitle['titre']); ?></a></p>
                                <p class="legend">billet suivant</p>
                            </div>
                       <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $arrowesPart = ob_get_clean(); ?>


<!-- ********** AFFICHE LES COMMENTAIRES ********* -->

<?php ob_start();?>
<div class="bloc-comments">
    <h3 class="nbr-comments"><?= htmlspecialchars($nbrComments['nbr_com']); ?> Commentaires</h3>
    <!-- apparaissent en jquery et envoie en ajax -->
    <div class="container-comments">

    <?php while($chapterComments = $chapterCommentsData->fetch()) {

            if($chapterComments['signalement'] > 0) {
                ?>
                <div class="comment">
                    <div class="commentaire">
                        <p class="commennt-body alert">
                            Ce commentaire a été désactivé
                        </p>
                    </div>
                </div>
            <?php
            }
            else {
        ?>
            <div class="comment">
                <div>
                    <div class="avatar"><img src="<?= htmlspecialchars($chapterComments['url_image']); ?>" /></div>
                </div>
                <div>
                    <div id="<?= htmlspecialchars($chapterComments['id']); ?>" class="commentaire">
                        <span class="comment-name"><?= htmlspecialchars($chapterComments['pseudo']); ?></span>
                        <p class="commennt-body">
                            <?= htmlspecialchars($chapterComments['commentaire']); ?>
                        </p>
                    </div>
                    <div class="infos-comment">
                       
                        <?php
                        if(isset($_SESSION['user_name']) AND isset($_SESSION['user_image'])) {
                            if ($chapterComments['pseudo'] == $_SESSION['user_name']) { ?>

                                <!-- on fait un form qu'on affichera pas (pour transmettre les données) -->
                                <form class="form-editer-commentaire" style="display:none;">
                                    <input name="chapitre"
                                           value="<?= htmlspecialchars($chapterComments['id_billet']); ?>">
                                    <input name="id_commentaire"
                                           value="<?= htmlspecialchars($chapterComments['id']); ?>">
                                    <input name="pseudo" value="<?= htmlspecialchars($chapterComments['pseudo']); ?>">
                                    <input name="edit_comment" value="true">
                                    <input name="comment_is_answer" value="false">
                                </form>

                                <form class="form-supprimer-commentaire" style="display:none;">
                                    <input name="chapitre"
                                           value="<?= htmlspecialchars($chapterComments['id_billet']); ?>">
                                    <input name="pseudo" value="<?= htmlspecialchars($chapterComments['pseudo']); ?>">
                                    <input name="suppr_comment" value="true">
                                    <input name="comment_is_answer" value="false">
                                </form>

                                <span class="edit-comment"><a href="#">éditer</a></span>
                                <span class="suppr-comment"><a href="#">supprimer</a></span>
                            <?php }
                        }
                        ?>
                        <span class="alert-comment"><a href="/blog/index.php?action=histoire&amp;chapitre=<?= htmlspecialchars($chapterComments['id_billet']); ?>&amp;alert=<?= $chapterComments['id']; ?>">signaler</a></span>
                        <span class="date-comment"><?= htmlspecialchars($chapterComments['date_com']); ?></span>

                        
                    </div>
                </div>
            </div>

        <?php
        }
    }$chapterCommentsData->closeCursor();

        if(isset($facebook_login_url))
            {
                echo $facebook_login_btn;
            }
            else
            { ?>
        <div>
            <div>
                <div class="avatar avatar-now" >
                    <img src="<?=$_SESSION['user_image']?>" />
                </div>
            </div>
            <form action="" method="POST" id="com">
                <p><textarea placeholder="<?php if(isset($textareaVide)) {
                    echo 'Attention votre message est vide';
                }
                else {
                   echo 'Laissez un commentaire';
                }
                ?>" name="commentaire"></textarea></p>
                <p><input data-chapitre = "<?= $_GET['chapitre']; ?>" type="submit" name="send-comment" id="send-comment" value="envoyer"></p>
            </form>
        </div>
    <?php } ?>

    </div>
</div>

<?php $secondContentLeft = ob_get_clean();
 ?>


<!-- ************ AFFICHE LES ARTICLES SUIVANTS  ***********-->

<?php ob_start();
$i = 0;
while($next = $nextStories->fetch()) {
    $i++;
  
    if($i == 1) {?>
        <div class="book-full">
        <h3>L'Histoire</h3>
    <?php } ?>
        <div class="chapter">
            <div class="thumbnail" style="background-image: url(<?= '/blog/admin/'.htmlspecialchars($next['lien_image']); ?>)"></div>
            <div>
                <h4><a href="/blog/histoire/chapitre-<?= strip_tags($next['id']); ?>"><?= htmlspecialchars($next['titre']); ?></a></h4>
            </div>
        </div>
    
        <?php
    }
    
if($i == 0) {
    echo    '<div class="book-full">
                <h3 style="width:145px">FIN DE L\'HISTOIRE !</h3>
                <ul class="liens_utiles">
                    <li><a href="/blog/accueil">Accueil</a></li>
                    <li><a href="/blog/contact">Contact</a></li>
                </ul>
            </div>';
}

$firstContentRight = ob_get_clean();

require $_SERVER["DOCUMENT_ROOT"].'/blog/view/template.php'; ?>


