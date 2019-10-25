<?php ob_start(); ?>
<div class="book-full">
<h3>L'Histoire</h3>
<?php while($next = $nextStories->fetch()) { ?>

    <div class="chapter">
        <div class="thumbnail"></div>
            <div>
                <h4><?= $next['titre'];?></h4>
            </div>
        </div>

    </div>

    <?php
}?>
    
</div>
<?php
$firstContentRight = ob_get_clean();
require 'view/template.php';
 ?>