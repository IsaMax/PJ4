<?php
ob_start();
?>

<table class="tab-messages">
    <thead>
    <tr>
        <td></td>
        <td>prenom</td>
        <td>mail</td>
        <td>message</td>
    </tr>

    </thead>
    <tbody>

    <?php
    $i = 0;
    foreach ($amrep as $rep) {
        $i++;
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $rep['prenom']; ?></td>
            <td><?= $rep['contenu']; ?></td>
            <td><?= $rep['mail']; ?></td>
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