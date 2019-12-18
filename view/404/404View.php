<?php
ob_start();
?>

<div>
<h2><?= 'ERREUR : '.$erreur; ?></h2>
</div>


<?php
$firstContentLeft = ob_get_clean();
require 'view/template.php';
?>
