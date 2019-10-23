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
                <img src="public/images/paque.jpg">
            </div>
            <div class="comms-body">
                <p class="comm-author"><a href=""> <?= htmlspecialchars($recentCommentsData['pseudo']); ?> </a></p>
                <p class="comm-text"> <?= htmlspecialchars($recentCommentsData['commentaire']); ?> </p>
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