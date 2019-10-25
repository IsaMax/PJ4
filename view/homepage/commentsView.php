<!-- COMMENTAIRES -->

<?php 
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
                <p class="comm-author"><a href=""> <?= htmlspecialchars($recentCommentsData['pseudo']); ?> </a></p>
                <p class="comm-text"> <?= substr(htmlspecialchars($recentCommentsData['commentaire']), 0, 35) . "..."; ?> </p>
                <p class="comm-more"><a href="">voir &raquo;</a></p>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php 
$secondContentRight = ob_get_clean();
require 'view/template.php';
?>