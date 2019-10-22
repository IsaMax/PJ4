<!-- DERNIERS POSTS --> 
<?php 
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
<?php
$placeRecentStories = ob_get_clean();
require 'homepage/template.php';
?>