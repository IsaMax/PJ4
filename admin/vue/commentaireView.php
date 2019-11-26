<?php
ob_start();
?>

<table class="tab-commentaires">
    <thead>
    <tr>
        <td>avatar</td>
        <td>pseudo</td>
        <td>commentaire</td>
        <td>date</td>
    </tr>

    </thead>
    <tbody>

    <?php
    $i = 0;
    $titreencours = '';

    foreach ($acrep as $valeur) {

       if($valeur['titre'] != $titreencours) {
           $i++;
           $titreencours = $valeur["titre"];

           //mise en page
           $valeur_cadre = ($i%2 == 0) ? 'cadre-2' : 'cadre-1';
           echo '<tr class="titre-billet '.$valeur_cadre.'"><td colspan="4">'.$valeur["titre"].'</td></tr>';

           }

       ?>

       <tr class="<?= $valeur_cadre; ?>">
           <td ><div class="avatar"><img src="<?= $valeur['url_image']; ?>" alt="avatar"></div></td>
           <td><?= $valeur['pseudo']; ?></td>
           <td><?= $valeur['commentaire']; ?></td>
           <td><?= $valeur['date_format']; ?></td>
       </tr>

       <?php

       }
        ?>
    </tbody>
</table>


<?php
$content = ob_get_clean();
require 'vue/template.php';
?>
