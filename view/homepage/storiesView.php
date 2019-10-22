<?php
ob_start();
?>
<div class="bloc-items-left">
<?php
while($storyData = $stories->fetch() AND $commentsData = $nbrComments->fetch()) {
?>
    <div class="post-item">
        <div class="bloc-img">
            <div></div>
            <div class="hover-effect">
                <i class=""></i>
            </div>
        </div>
        <div class="bloc-text">
            <p class="book-name">LIFE & STYLE , PHOTOGRAPH , TRAVEL</p>
            <h3 class="bloc-title"> <?= htmlspecialchars($storyData['titre']); ?> </h3>
            <div class="bloc-infos">
                <div class="author-part">
                    <i class="fa fa-user"></i>
                    <span>J. Forteroche</span>
                </div>
                <div class="date-part">
                    <i class="fa fa-clock-o"></i>
                    <span><?= htmlspecialchars($storyData['publi_billet']); ?></span>
                </div>
                <div class="comments-part">
                    <i class="fa fa-comments-o"></i>
                    <span>27</span>
                </div>
            </div>
            <p class="bloc-teaser"> <?= htmlspecialchars($storyData['contenu']); ?> </p>
            <p class="bloc-button"><a href="index.php?action=histoire&amp;chapitre=<?= $storyData['id']; ?>">Découvrir</a></p>
        </div>
    </div>

<?php
}
$placeStories = ob_get_clean();
require 'view/template.php';
?>