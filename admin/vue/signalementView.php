<?php
ob_start();
?>
<form action="index.php?action=signalement&operation=traitement_signalement" method="post" id="js-choix-signalement">
    <table>
        <thead>
            <tr>
                <td rowspan="2">signalement</td>
                <td rowspan="2">auteur</td>
                <td rowspan="2">commentaire</td>
                <td rowspan="2">date</td>
                <td colspan="2">action</td>
            </tr>
            <tr>
                <td>approuver</td>
                <td>supprimer</td>
            </tr>
        </thead>
        <tbody>

        <?php
        $i = 0;
        foreach ($gsrep as $rep) {
        $i++;
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $rep['pseudo']; ?></td>
            <td><?= $rep['commentaire']; ?></td>
            <td><?= $rep['date_commentaire']; ?></td>

            <td>
                <input type="radio" name="action-signalement[<?= $rep['id']; ?>]" value="approuver" id="id-signalement-1-<?= $rep['id']; ?>" required>
                <label class="checkbox" for="id-signalement-1-<?= $rep['id']; ?>"></label>
            </td>

            <td>
                <input type="radio" name="action-signalement[<?= $rep['id']; ?>]" value="supprimer" id="id-signalement-2-<?= $rep['id']; ?>" required>
                <label class="checkbox" for="id-signalement-2-<?= $rep['id']; ?>"></label>
            </td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <input type="submit" class="btn btn-signalement" name="valider-signalement" value="EXECUTER" onclick="return confirm('Action définitive, continuer ?')">
</form>

<?php
$content = ob_get_clean();
require 'vue/template.php';
?>
