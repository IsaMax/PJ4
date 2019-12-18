
<!-- SLIDER HOMEPAGE -->
<?php
ob_start();

$i = 0;

 echo ' <div class="container-slider"><div class="bloc-photos">';

 foreach($stories as $storyData) {
     $i++;
?>
     <div class="photo-slider" style="background-image: url(./admin/<?= htmlspecialchars($storyData["lien_image"])?>); "></div>

  <?php
     if($i == 4) {
         break;
     }
 }

 echo '</div><div class="bloc-visible">';

 $i = 0;
foreach($stories as $storyData) {
    $i++;
 ?>

     <div class="bloc-sombre-<?= $i; ?>
     <?php if($i == 1) {echo'active';} ?>">
         <div class="bloc-text">
             <p class="book-name">Journal de bord de la navigatrice Irina Oneguine</p>
             <a href="histoire/chapitre-<?= $storyData['id']; ?>"><h2 class="bloc-title">
                    <?= htmlspecialchars($storyData['titre']); ?> </h2></a>
             <p class="date"><?= htmlspecialchars($storyData['publi_billet']); ?></p>
             <p class="bloc-button"><a href="histoire/chapitre-<?= strip_tags($storyData['id']); ?>">Découvrir</a>
             </p>
         </div>
     </div>

    <?php
    if($i == 4) {
        break;
    }
    }
    echo '</div></div>';

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
            <div style="background-image: url(./admin/<?= htmlspecialchars($storyData['lien_image'])?>);"></div>
            <div class="hover-effect">
                <i class=""></i>
            </div>
        </div>
        <div class="bloc-text">
            <p class="book-name">Journal de bord de la navigatrice Irina Oneguine</p>
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

                    <?php
                    $nbrcoms = (is_null($nbrComments[$i]["nbrComms"])) ? '0' : $nbrComments[$i]["nbrComms"];

                   echo '<span>'.$nbrcoms.'</span>';
                    ?>
                </div>
            </div>
            <p class="bloc-teaser"> <?= substr(strip_tags($storyData['contenu']), 0, 100) . "..."; ?> </p>
            <p class="bloc-button"><a href="histoire/chapitre-<?= strip_tags($storyData['id']); ?>">Découvrir</a></p>
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
    <h3>Derniers chapitres</h3>
    <?php
    while($recentStoriesData = $recentStories->fetch()) {
    ?>
        <div class="chapter">
            <div class="thumbnail" style="background-image: url(./admin/<?= $recentStoriesData['lien_image']; ?>); "></div>
                <div>
                    <h4> <a href="histoire/chapitre-<?= strip_tags($recentStoriesData['id']); ?>">
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
            <div class="avatar" style="background-image: url(<?= $recentCommentsData['url_image'] ?>);">
            </div>
            <div class="comms-body">
                <p class="comm-author"> <?= htmlspecialchars($recentCommentsData['pseudo']); ?></p>
                <p class="comm-text"> <?= substr(htmlspecialchars($recentCommentsData['commentaire']), 0, 35) . "..."; ?> </p>
                <p class="comm-more"><a href="histoire/chapitre-<?= htmlspecialchars($recentCommentsData['id_billet'])."#".htmlspecialchars($recentCommentsData['id']); ?>">voir &raquo;</a></p>
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