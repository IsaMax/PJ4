<?php
ob_start();
?>

<div class="container-slider">
    <div class="bloc-photos">
        <div class="photo1" data-url-photo="https://www.iledebatz.net/wp-content/uploads/2019/06/ile-de-batz02.jpg" ></div>
        <div class="photo2" data-url-photo="https://www.iledebatz.net/wp-content/uploads/2019/06/ile-de-batz03.jpg" ></div>
        <div class="photo3" data-url-photo="https://www.iledebatz.net/wp-content/uploads/2019/06/ile-de-batz01.jpg" ></div>
        <div class="photo4" data-url-photo="http://www.maximumwall.com/wp-content/uploads/2015/07/fonds-ecran-ile-paradisique-3.jpg" ></div>
    </div>

    <div class="bloc-visible">
        <div class="bloc-sombre-1 active">
            <div class="bloc-text">
                <p class="book-name">LIFE & STYLE , PHOTOGRAPH , TRAVEL</p>
                <a href="index.php?action=histoire&amp;chapitre=<?= $storyData['id']; ?>"><h2 class="bloc-title"> titre de l'article </h2></a>  
                <p class="date">10 avr 2012</p>
                <p class="bloc-button"><a href="index.php?action=histoire&amp;chapitre=<?= $storyData['id']; ?>">Découvrir</a></p>
            </div>
        </div>

        <div class="bloc-sombre-2">
            <div class="bloc-text">
                <p class="book-name">LIFE & STYLE , PHOTOGRAPH , TRAVEL</p>
                <a href="index.php?action=histoire&amp;chapitre=<?= $storyData['id']; ?>"><h2 class="bloc-title"> titre de l'article </h2></a>
                <p class="date">10 avr 2012</p>   
                <p class="bloc-button"><a href="index.php?action=histoire&amp;chapitre=<?= $storyData['id']; ?>">Découvrir</a></p>
            </div>
        </div>

        <div class="bloc-sombre-3">
            <div class="bloc-text">
                <p class="book-name">LIFE & STYLE , PHOTOGRAPH , TRAVEL</p>
                <a href="index.php?action=histoire&amp;chapitre=<?= $storyData['id']; ?>"><h2 class="bloc-title"> titre de l'article </h2></a>
                <p class="date">10 avr 2012</p>    
                <p class="bloc-button"><a href="index.php?action=histoire&amp;chapitre=<?= $storyData['id']; ?>">Découvrir</a></p>
            </div>
        </div>

        <div class="bloc-sombre-4">
            <div class="bloc-text">
                <p class="book-name">LIFE & STYLE , PHOTOGRAPH , TRAVEL</p>
                <a href="index.php?action=histoire&amp;chapitre=<?= $storyData['id']; ?>"><h2 class="bloc-title"> titre de l'article </h2></a>
                <p class="date">10 avr 2012</p>    
                <p class="bloc-button"><a href="index.php?action=histoire&amp;chapitre=<?= $storyData['id']; ?>">Découvrir</a></p>
            </div>
        </div>
    </div>
</div>

<?php
$slider = ob_get_clean(); 


ob_start();
?>

<!-- ************* BLOC CHAPITRES *************  -->

<div class="bloc-items-left">
<?php
$i = 0;
foreach($stories as $storyData) {
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
            <h2 class="bloc-title"> <?= htmlspecialchars($storyData['titre']); ?> </h2>
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
                    <span><?= $nbrComments[$i]["nbrComms"]; ?></span>
                </div>
            </div>
            <p class="bloc-teaser"> <?= substr(htmlspecialchars($storyData['contenu']), 0, 100) . "..."; ?> </p>
            <p class="bloc-button"><a href="index.php?action=histoire&amp;chapitre=<?= $storyData['id']; ?>">Découvrir</a></p>
        </div>
    </div>
    
<?php $i++;
} ?>
</div>

<!-- ************* BLOC DERNIER CHAPITRE *************  -->

<?php
$firstContentLeft = ob_get_clean();
ob_start();
?>
<div class="book-full">
    <h3>L'Histoire</h3>
    <?php
    while($recentStoriesData = $recentStories->fetch()) {
    ?>
        <div class="chapter">
            <div class="thumbnail"></div>
                <div>
                    <h4> <a href="index.php?action=histoire&amp;chapitre=<?= $recentStoriesData['id']; ?>">
                    <?= htmlspecialchars($recentStoriesData['titre']); ?></a>
                    </h4>
                </div>
        </div>
    <?php
    }
    ?>
</div>

<!-- ************* BLOC COMMENTAIRES *************  -->

<?php
$firstContentRight = ob_get_clean();
ob_start();
?>
<div class="comments-part-right">
    <h3>Commentaires récents</h3>

    <?php
    while($recentCommentsData = $recentComments->fetch()) {
        ?>
        <div class="comm">
            <div class="avatar">
            </div>
            <div class="comms-body">
                <p class="comm-author"> <?= htmlspecialchars($recentCommentsData['pseudo']); ?></p>
                <p class="comm-text"> <?= substr(htmlspecialchars($recentCommentsData['commentaire']), 0, 35) . "..."; ?> </p>
                <p class="comm-more"><a href="index.php?action=histoire&amp;chapitre=<?= htmlspecialchars($recentCommentsData['id_billet'])."#".htmlspecialchars($recentCommentsData['id']); ?>">voir &raquo;</a></p>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php 
$secondContentRight = ob_get_clean();

$titlePage = 'le blog de Jean FORTEROCHE - Accueil';
require 'view/template.php';
?>